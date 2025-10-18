@extends('layouts.app')
@section('title', 'Listings — DormSeek')

@section('content')
  <div class="container mx-auto px-4 py-8">
    <div class="flex gap-6">
      <aside class="w-64 hidden lg:block">
        <div class="bg-white p-4 rounded shadow-sm">
          <h4 class="font-semibold mb-3">Filters</h4>
          <form method="GET" action="{{ route('dashboard') }}">
            <label class="block text-sm">Kabacan</label>
            {{-- <select name="city" class="border rounded p-2">
    <option value="">All Cities</option>
    <option value="Kabacan">Kabacan</option>
</select> --}}

            <label class="block text-sm">Min price</label>
            <input name="min_price" value="{{ request('min_price') }}" class="w-full border rounded px-2 py-1 mb-3" />

            <label class="block text-sm">Beds</label>
            <input type="number" name="beds" value="{{ request('beds') }}" class="w-full border rounded px-2 py-1 mb-3" />

            <button type="submit" class="w-full bg-dorm-primary text-white px-3 py-2 rounded">Apply</button>
          </form>
        </div>
      </aside>

      <div class="flex-1">
        <div class="mb-6 flex items-center justify-between">
          <h2 class="text-2xl font-semibold">Available dorms</h2>
          <div class="text-sm text-gray-600">{{ $properties->total() }} results</div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
          @forelse($properties as $property)
            @include('components.property-card', ['property' => $property])
          @empty
            <div class="p-4 bg-white rounded shadow">No properties found.</div>
          @endforelse
        </div>

        <div class="mt-6">
          {{ $properties->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection