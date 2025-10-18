<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $properties = [
            [
                'title' => 'Maple Residences',
                'slug' => Str::slug('Maple Residences'),
                'city' => 'Sunrise Street',
                'description' => 'A cozy dorm located near the university gate. Offers air-conditioned rooms, free Wi-Fi, and a shared kitchen for students.',
                'price' => 1200,
                'images' => json_encode(['maple.jpg']),
            ],
            [
                'title' => 'Luna Dorms',
                'slug' => Str::slug('Luna Dorms'),
                'city' => 'Mollonville',
                'description' => 'Modern dorm with individual study desks and 24/7 security.',
                'price' => 1800,
                'images' => json_encode(['luna.jpg']),
            ],
            [
                'title' => 'Greenleaf Dorm',
                'slug' => Str::slug('Greenleaf Dorm'),
                'city' => 'Sunset Street',
                'description' => 'Eco-friendly dorm featuring solar panels and a rooftop garden.',
                'price' => 1500,
                'images' => json_encode(['greenleaf.jpg']),
            ],
            [
                'title' => 'Bluehaven Suites',
                'slug' => Str::slug('Bluehaven Suites'),
                'city' => 'Sinamar1 Street',
                'description' => 'Premium dorm with air-conditioned rooms, Wi-Fi, and gym access.',
                'price' => 2500,
                'images' => json_encode(['bluehaven.jpg']),
            ],
            [
                'title' => 'Oakview Dorm',
                'slug' => Str::slug('Oakview Dorm'),
                'city' => 'Matalam Street',
                'description' => 'Quiet dorm with a great study environment and spacious common area.',
                'price' => 2000,
                'images' => json_encode(['oakview.jpg']),
            ],
            [
                'title' => 'Riverstone Hall',
                'slug' => Str::slug('Riverstone Hall'),
                'city' => 'Masagana Luna',
                'description' => 'Well-maintained dorm with clean amenities and a friendly community.',
                'price' => 1600,
                'images' => json_encode(['riverstone.jpg']),
            ],
            [
                'title' => 'Skyline Dormitory',
                'slug' => Str::slug('Skyline Dormitory'),
                'city' => 'Malvar Street',
                'description' => 'Dorm with a stunning view of the city and a cozy ambiance.',
                'price' => 2200,
                'images' => json_encode(['skyline.jpg']),
            ],
            [
                'title' => 'Sunrise Lodge',
                'slug' => Str::slug('Sunrise Lodge'),
                'city' => 'Sinamar2 Street',
                'description' => 'Affordable dorm offering clean rooms and accessible transport routes.',
                'price' => 1000,
                'images' => json_encode(['sunrise.jpg']),
            ],
            [
                'title' => 'Sunset Residences',
                'slug' => Str::slug('Sunset Residences'),
                'city' => 'USM Avenue',
                'description' => 'Dorm near the city center with a rooftop lounge and study hall.',
                'price' => 1400,
                'images' => json_encode(['sunset.jpg']),
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
