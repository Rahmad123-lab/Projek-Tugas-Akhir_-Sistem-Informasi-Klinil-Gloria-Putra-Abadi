<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPassword = Hash::make('user123');

        DB::table('users')->insert([
            [
                'name' => 'Administrator ',
                'email' => 'admin@gmail.com',
                'password' => $defaultPassword,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pasien',
                'email' => 'pasien@gmail.com',
                'password' => $defaultPassword,
                'role' => 'pasien',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Apoteker',
                'email' => 'apoteker@gmail.com',
                'password' => $defaultPassword,
                'role' => 'apoteker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr Barra Baihaqi',
                'email' => 'barra@gmail.com',
                'password' => $defaultPassword,
                'role' => 'dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr Barri Tasbiha',
                'email' => 'barri@gmail.com',
                'password' => $defaultPassword,
                'role' => 'dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr Sybill',
                'email' => 'sybill@gmail.com',
                'password' => $defaultPassword,
                'role' => 'dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr.Sudomo Colombus Situmorang, S.Farm',
                'email' => 'doktersudomo@gmail.com',
                'password' => $defaultPassword,
                'role' => 'dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
