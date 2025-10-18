<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->sentence(3);
        $slug = Str::slug($title) . '-' . $this->faker->unique()->numberBetween(100,999);
        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $this->faker->paragraphs(3, true),
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'price' => $this->faker->numberBetween(1000,2500),
            'beds' => $this->faker->numberBetween(2,5),
            'baths' => $this->faker->numberBetween(1,3),
            'area' => $this->faker->numberBetween(150,1200),
            'images' => ['placeholder-1.jpg','placeholder-2.jpg'], // make sure placeholder files exist in storage
            'is_published' => true,
        ];
    }
}
