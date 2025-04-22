<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transmission')->insert([
            ['type' => 'Automatic'],
            ['type' => 'Manual'],
        ]);
    }
}
