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
                'city' => 'Quezon City',
                'description' => 'A cozy dorm located near the university gate. Offers air-conditioned rooms, free Wi-Fi, and a shared kitchen for students.',
                'price' => 4500,
                'images' => json_encode(['maple.jpg']),
            ],
            [
                'title' => 'Luna Dorms',
                'slug' => Str::slug('Luna Dorms'),
                'city' => 'Makati City',
                'description' => 'Modern dorm with individual study desks and 24/7 security.',
                'price' => 5200,
                'images' => json_encode(['luna.jpg']),
            ],
            [
                'title' => 'Greenleaf Dorm',
                'slug' => Str::slug('Greenleaf Dorm'),
                'city' => 'Manila',
                'description' => 'Eco-friendly dorm featuring solar panels and a rooftop garden.',
                'price' => 4300,
                'images' => json_encode(['greenleaf.jpg']),
            ],
            [
                'title' => 'Bluehaven Suites',
                'slug' => Str::slug('Bluehaven Suites'),
                'city' => 'Taguig',
                'description' => 'Premium dorm with air-conditioned rooms, Wi-Fi, and gym access.',
                'price' => 6000,
                'images' => json_encode(['bluehaven.jpg']),
            ],
            [
                'title' => 'Oakview Dorm',
                'slug' => Str::slug('Oakview Dorm'),
                'city' => 'Pasig City',
                'description' => 'Quiet dorm with a great study environment and spacious common area.',
                'price' => 4700,
                'images' => json_encode(['oakview.jpg']),
            ],
            [
                'title' => 'Riverstone Hall',
                'slug' => Str::slug('Riverstone Hall'),
                'city' => 'Cebu City',
                'description' => 'Well-maintained dorm with clean amenities and a friendly community.',
                'price' => 4000,
                'images' => json_encode(['riverstone.jpg']),
            ],
            [
                'title' => 'Skyline Dormitory',
                'slug' => Str::slug('Skyline Dormitory'),
                'city' => 'Baguio City',
                'description' => 'Dorm with a stunning view of the city and a cozy ambiance.',
                'price' => 4800,
                'images' => json_encode(['skyline.jpg']),
            ],
            [
                'title' => 'Sunrise Lodge',
                'slug' => Str::slug('Sunrise Lodge'),
                'city' => 'Davao City',
                'description' => 'Affordable dorm offering clean rooms and accessible transport routes.',
                'price' => 3900,
                'images' => json_encode(['sunrise.jpg']),
            ],
            [
                'title' => 'Sunset Residences',
                'slug' => Str::slug('Sunset Residences'),
                'city' => 'Iloilo City',
                'description' => 'Dorm near the city center with a rooftop lounge and study hall.',
                'price' => 4100,
                'images' => json_encode(['sunset.jpg']),
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
