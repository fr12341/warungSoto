<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'category_id' => \App\Models\Category::factory(),
        'name' => $this->faker->randomElement([
        'Soto Ayam', 'Soto Daging', 'Soto Betawi', 'Soto Banjar', 'Soto Lamongan'
        ]),
        'slug' => $this->faker->unique()->slug(),
        'description' => $this->faker->paragraph(),
        'price' => $this->faker->randomFloat(2, 10000, 50000),
        'stock' => $this->faker->numberBetween(10, 100),
        'image' => $this->faker->imageUrl(640, 480, 'food'),
        ];
    }
}
