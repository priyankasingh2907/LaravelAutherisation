<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
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

        $title = fake()->unique()->name();
        $slug = str::slug($title);

        $subCategory = [32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82];
        $subcatRandKey = array_rand($subCategory);

        $category = [14,15,16,17,18,19,20.21,22,23];
        $catRandKey = array_rand($category);
        
        $brand = [
            22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41];
        $brandRandKey = array_rand($brand);  

        return [
             'title' => $title,
            'slug' => $slug,
            'category_id' => $category[$catRandKey],
            'subcategory_id' => $subCategory[$subcatRandKey],
              'shortdescription' => fake()->text(100),
             'description' => fake()->text(300),
             'price' => fake()->randomFloat(2, 0, 1000),
             'qty' => fake()->numberBetween(1, 100),
             'status' => 1,
             'compare_price'=> fake()->randomFloat(2, 0, 900) ,
             'brand_id'=> $brand[$brandRandKey]  ,
             'isFeatured'=>'yes',
             'sku'=>rand(2,5000),
             'barcode'=>fake()->name(1),
             'track_qty'=>'yes',  
             'image'=>'default-150x150.png',  
             'created_at'=>now(),
             'updated_at'=>now(),          
            'status'=>1,
 ];
    }
}
