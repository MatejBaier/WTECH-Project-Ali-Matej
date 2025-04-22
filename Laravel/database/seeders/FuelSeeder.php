<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fuel')->insert([
            ['type' => 'Petrol'],
            ['type' => 'Diesel'],
            ['type' => 'Electric'],
            ['type' => 'CNG'],
            ['type' => 'LPG'],
            ['type' => 'Hybrid'],
            ['type' => 'Hydrogen'],
        ]);
    }
}
