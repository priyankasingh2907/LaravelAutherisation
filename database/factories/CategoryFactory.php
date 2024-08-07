<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'slug' => $this->faker->slug(2),
            'name' => $this->faker->sentence(2),
            'image' => $this->faker->paragraph(2),
       'status'=>rand(1,2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
