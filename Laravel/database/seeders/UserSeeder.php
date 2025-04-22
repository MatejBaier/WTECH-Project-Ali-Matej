<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        $users = [
            [
                'full_name' => 'Ali Alinovsky',
                'email' => 'ali@shop.com',
                'phone_number' => '1234567890',
                'password' => Hash::make('AliAdmin'),
                'state' => 'Slovakia',
                'city' => 'Bratislava',
                'address' => 'Ali Street 1',
                'postal_code' => '81101',
                'is_admin' => true,
            ],
            [
                'full_name' => 'Bajo Bajovsky',
                'email' => 'bajo@shop.com',
                'phone_number' => '0987654321',
                'password' => Hash::make('BajoAdmin'),
                'state' => 'Slovakia',
                'city' => 'Senec',
                'address' => 'Kebab Street 2',
                'postal_code' => '90301',
                'is_admin' => true,
            ],
            [
                'full_name' => 'Fero Sumacher',
                'email' => 'fero@sumacher.com',
                'phone_number' => '099999999999',
                'password' => Hash::make('Feri'),
                'state' => 'Slovakia',
                'city' => 'Žilina',
                'address' => 'Pretekarska 3',
                'postal_code' => '01001',
                'is_admin' => false,
            ],
            [
                'full_name' => 'Jozko Mrkvicka',
                'email' => 'jozko.mrkvicka@gmail.com',
                'phone_number' => '01111111111',
                'password' => Hash::make('Jozi'),
                'state' => 'Slovakia',
                'city' => 'Nitra',
                'address' => 'Zahradkarska 4',
                'postal_code' => '94901',
                'is_admin' => false,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
