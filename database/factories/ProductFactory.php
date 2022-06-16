<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Colour' => $this->faker->text,
            'Category' => $this->faker->text,
            'Description' => $this->faker->text,
            'Size' => Str::random(10),
            'Price' => Str::random(10),
        ];
    }
}
