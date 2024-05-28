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
                'id_user'=>3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr Barri Tasbiha',
                'spesialisasi_dokter' => 'Mata',
                'alamat_dokter' => 'Jl Jawa',
                'id_user'=>4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr Sybill',
                'spesialisasi_dokter' => 'Jantung',
                'alamat_dokter' => 'Jl Semarang',
                'id_user'=>5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr Qiana',
                'spesialisasi_dokter' => 'THT',
                'alamat_dokter' => 'Jl Makasar',
                'id_user'=>6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            
        ]);
    }
}
