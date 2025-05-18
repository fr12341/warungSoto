<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Buat users
        \App\Models\User::factory(5)->create();
        // Buat kategori dan produk
        \App\Models\Category::factory(5)->create()->each(function ($category) {
        // \App\Models\Product::factory(5)->create([
        //     'category_id' => $category->id
        // ]);
        // Buat alamat untuk tiap user
        \App\Models\User::all()->each(function ($user) {
        \App\Models\Address::factory()->create([
            'user_id' => $user->id
        ]);
        });
    });
    }
}
