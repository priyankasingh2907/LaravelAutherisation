<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.CatogarySeeder
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\category::factory(10)->create();
        // \App\Models\subcategory::factory(20)->create();

        // \App\Models\Brand::factory(20)->create();
        \App\Models\product::factory(100)->create();
    }
}
