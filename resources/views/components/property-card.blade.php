@props(['property'])

@php
    // Decode images safely
    $images = json_decode($property->images, true);
@endphp

<article class="bg-white rounded shadow-sm overflow-hidden">
  <a href="{{ route('properties.show', $property->id) }}" class="block">
    <div class="h-48 w-full bg-gray-100">
      @if(!empty($images) && count($images) > 0)
          <img 
              src="{{ asset('properties/' . $images[0]) }}" 
              alt="{{ $property->title }}" 
              class="w-full h-64 object-cover rounded-t-lg"
          />
      @else
          <p class="text-center text-gray-400 py-16">No image available</p>
      @endif
    </div>
  </a>

  <div class="p-4">
    <h3 class="text-lg font-semibold truncate">{{ $property->title }}</h3>
    <p class="text-sm text-gray-500 mt-1">{{ Str::limit($property->description, 100) }}</p>
    <div class="mt-3 flex items-center justify-between">
      <div class="text-dorm-primary font-bold">₱{{ number_format($property->price, 2) }}</div>
      <a href="{{ route('properties.show', $property->id) }}" class="text-sm text-blue-600">View</a>
    </div>

    <div class="mt-2">
      @if(isset($property->is_available) ? $property->is_available : ($property->is_published ?? false))
        <span class="text-green-600 font-semibold">Available</span>
      @else
        <span class="text-red-600 font-semibold">Not Available</span>
      @endif
    </div>
  </div>
</article>