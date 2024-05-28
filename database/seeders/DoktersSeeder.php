<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoktersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokters')->insert([
            [
                'nama_dokter' => 'Dr Barra Baihaqi',
                'spesialisasi_dokter' => 'Obgyn',
                'alamat_dokter' => 'Jl Darmo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr Barri Tasbiha',
                'spesialisasi_dokter' => 'Mata',
                'alamat_dokter' => 'Jl Jawa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr Sybill',
                'spesialisasi_dokter' => 'Jantung',
                'alamat_dokter' => 'Jl Semarang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr Qiana',
                'spesialisasi_dokter' => 'THT',
                'alamat_dokter' => 'Jl Makasar',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            
        ]);
    }
}
