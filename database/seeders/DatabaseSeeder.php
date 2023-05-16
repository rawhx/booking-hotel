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
            'profile' => '/admin/assets/images/users/profile-pic.jpg',
        ]);

        $this->call(RoomsSeeder::class);
    }
}
