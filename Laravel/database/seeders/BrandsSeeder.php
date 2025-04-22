<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Audi'],
            ['name' => 'Bentley'],
            ['name' => 'BMW'],
            ['name' => 'Ferrari'],
            ['name' => 'Jaguar'],
            ['name' => 'Lamborghini'],
            ['name' => 'Maserati'],
            ['name' => 'Tesla'],
        ]);
    }
}
