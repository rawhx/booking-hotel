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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'id' => rand(0, 9999999999),
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('admin'),
            'profile' => 'https://www.its.ac.id/international/wp-content/uploads/sites/66/2020/02/blank-profile-picture-973460_1280-300x300.jpg',
        ]);

        $this->call(RoomsSeeder::class);
    }
}
