<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class AdminController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('admin.dashboard', compact('properties'));
    }

    public function toggleAvailability($id)
    {
        $property = Property::findOrFail($id);
        // Prefer is_available if present, fallback to is_published
        if (isset($property->is_available)) {
            $property->is_available = ! $property->is_available;
        } else {
            $property->is_published = ! $property->is_published;
        }
        $property->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}


