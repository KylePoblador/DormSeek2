<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $city = $request->query('city');
        $min = $request->query('min_price');
        $max = $request->query('max_price');
        $beds = $request->query('beds');

        $query = Property::query()->where('is_published', true);

        if ($q) {
            $query->where(function($r) use ($q){
                $r->where('title', 'like', "%{$q}%")
                  ->orWhere('description', 'like', "%{$q}%")
                  ->orWhere('city', 'like', "%{$q}%");
            });
        }
        if ($city) $query->where('city', $city);
        if ($min !== null && $min !== '') {
            $query->where('price', '<=', (float)$min);
        }
        if ($max !== null && $max !== '') {
            $query->where('price', '>=', (float)$max)
                  ->orderBy('price', 'desc');
        }
        if ($beds) $query->where('beds', $beds);

        $properties = $query->orderBy('created_at', 'desc')->paginate(6)->withQueryString();

        // list of cities for filter (simple)
        $cities = Property::select('city')->distinct()->pluck('city');

        return view('properties.index', compact('properties','cities'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['title','description','address','city','price','beds','baths','area']);
        $data['slug'] = Str::slug($request->title).'_'.uniqid();

        // handle images
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time().'_'.Str::random(6).'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/properties', $name);
                $images[] = $name;
            }
        }
        $data['images'] = $images;
        $data['is_published'] = true;
        $property = Property::create($data);

        return redirect()->route('properties.show', $property->id)->with('success', 'Property created.');
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        // similar to store: validate and update
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('home')->with('success','Property removed.');
    }
}
