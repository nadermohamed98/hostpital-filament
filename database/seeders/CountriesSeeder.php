<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            [
                'name' => 'Egypt',
                'code' => 'EGP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Saudi Arabia',
                'code' => 'KSA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UAE',
                'code' => 'UAE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
