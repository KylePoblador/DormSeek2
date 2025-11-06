@extends('layouts.admin')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-6">🏠 DormSeek - Admin Dashboard</h1>
        <button type="button" onclick="window.history.back();" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Back
          </button>
        </div>
    <table class="w-full border-collapse border border-gray-300 text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">Apartment Name</th>
                <th class="border px-4 py-2 text-left">Amenities</th>
                <th class="border px-4 py-2 text-left">Location</th>
                <th class="border px-4 py-2 text-left">Price</th>
                <th class="border px-4 py-2 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td class="border px-4 py-2">{{ $property->title }}</td>
                    <td class="border px-4 py-2">{{ Str::limit($property->description, 50) }}</td>
                    <td class="border px-4 py-2">{{ $property->city }}</td>
                    <td class="border px-4 py-2">₱{{ number_format($property->price) }}</td>
                    <td class="text-center">
                      <form action="{{ route('admin.properties.toggle', $property->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        @if($property->is_available)
                          <button type="submit"
                            class="bg-blue-600 hover:bg-green-700 text-white font-semibold px-3 py-1 rounded-full shadow-md transition duration-200">
                            Available
                          </button>
                        @else
                          <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-3 py-1 rounded-full shadow-md transition duration-200">
                            Not Available
                          </button>
                        @endif
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if(method_exists($properties, 'links'))
        <div class="mt-4">{{ $properties->links() }}</div>
    @endif
    </div>
@endsection


