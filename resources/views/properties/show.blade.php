@extends('layouts.app')
@section('title', $property->title . ' — DormSeek')

@section('content')
  <div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="md:col-span-2">
        <div class="bg-white rounded shadow">
          <div class="h-80 bg-gray-100 overflow-hidden">
            @if($property->images)
              <img id="mainImage" src="{{ asset('storage/properties/'.$property->images[0]) }}" alt="" class="w-full h-full object-cover">
            @else
              <img src="{{ asset('images/placeholder-640x420.png') }}" class="w-full h-full object-cover" alt="">
            @endif
          </div>

          <div class="p-4 grid grid-cols-4 gap-2">
            @if($property->images)
              @foreach($property->images as $img)
                <img src="{{ asset('storage/properties/'.$img) }}" class="h-20 w-full object-cover cursor-pointer" onclick="document.getElementById('mainImage').src = '{{ asset('storage/properties/'.$img) }}'">
              @endforeach
            @endif
          </div>

          <div class="p-4">
            <h1 class="text-2xl font-bold">{{ $property->title }}</h1>
            <p class="text-gray-600 mt-2">{{ $property->address }}, {{ $property->city }}</p>
            <div class="mt-4">
              <h3 class="font-semibold">Description</h3>
              <p class="text-gray-700 mt-2">{{ $property->description }}</p>
            </div>
          </div>
        </div>
      </div>

      <aside>
        <div class="bg-white p-4 rounded shadow">
          <div class="text-2xl font-bold text-dorm-primary">₱{{ number_format($property->price, 2) }}</div>
          <div class="mt-3 text-sm text-gray-600">Beds: {{ $property->beds }} • Baths: {{ $property->baths }}</div>
          <a href="#" class="mt-4 inline-block w-full text-center bg-dorm-primary text-white px-4 py-2 rounded">Contact landlord</a>
        </div>
      </aside>
    </div>
  </div>

  <div class="w-full max-w-5xl mx-auto">
    <div class="relative w-full h-96 rounded-lg overflow-hidden shadow-sm">
        @php
            $images = json_decode($property->images, true);

            // If it's not an array (maybe malformed JSON), make it empty array
            if (!is_array($images)) {
                $images = [];
            }
        @endphp

        @if(!empty($images) && count($images) > 0)
            <img 
                src="{{ asset('properties/' . $images[0]) }}" 
                alt="{{ $property->title }}" 
                class="absolute inset-0 w-full h-full object-cover"
            />
        @else
            <div class="flex items-center justify-center h-full bg-gray-100 text-gray-400">
                No image available
            </div>
        @endif
    </div>

    <div class="mt-6 p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-2">{{ $property->title }}</h1>
        <p class="text-gray-600 mb-4">{{ $property->city }}</p>
        <p class="text-gray-700 leading-relaxed">{{ $property->description }}</p>

        <div class="mt-4 text-lg font-semibold text-dorm-primary">
            ₱{{ number_format($property->price, 2) }}
        </div>
    </div>
</div>
@endsection