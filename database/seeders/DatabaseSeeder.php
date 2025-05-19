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
    // Buat 10 user random
    \App\Models\User::factory(10)->create();

    // Buat 1 user test
    \App\Models\User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    // Buat 5 produk untuk masing-masing kategori enum
    $categories = ['makanan', 'minuman', 'snack'];
    foreach ($categories as $category) {
        \App\Models\Product::factory(5)->create([
            'category' => $category,
        ]);
    }

    // Buat address untuk tiap user
    \App\Models\User::all()->each(function ($user) {
        \App\Models\Address::factory()->create([
            'user_id' => $user->id,
        ]);
    });

    $this->call(AdminSeeder::class);
}

}
