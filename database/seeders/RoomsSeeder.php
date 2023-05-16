<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            'id' => rand(0, 9999999999),
            'name' => 'standart 01',
            'tipe' => 'standart',
            'price' => '150000',
            'aksi' => 1,
            'created_at' => now(),
        ]);
        
        DB::table('rooms')->insert([
            'id' => rand(0, 9999999999),
            'name' => 'standart 02',
            'tipe' => 'standart',
            'price' => '150000',
            'aksi' => 1,
            'created_at' => now(),
        ]);
        
        DB::table('rooms')->insert([
            'id' => rand(0, 9999999999),
            'name' => 'luxury 01',
            'tipe' => 'luxury',
            'price' => '450000',
            'aksi' => 1,
            'created_at' => now(),
        ]);
        
        DB::table('rooms')->insert([
            'id' => rand(0, 9999999999),
            'name' => 'luxury 02',
            'tipe' => 'luxury',
            'price' => '450000',
            'aksi' => 1,
            'created_at' => now(),
        ]);
    }
}
