<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\subcategory>
 */
class SubcategoryFactory extends Factory
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
            'name' => $this->faker->name,
       'status'=>rand(1,0),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
