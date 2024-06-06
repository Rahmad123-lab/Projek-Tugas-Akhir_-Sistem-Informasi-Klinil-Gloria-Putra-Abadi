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
                'nama_dokter' => 'Dr.Sudomo Colombus Situmorang, S.Farm',
                'spesialisasi_dokter' => ' Poli Umum',
                'alamat_dokter' => 'Jln. Ferdinan Lumban Tobing ',
                'id_user'=>3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr Barri Tasbiha',
                'spesialisasi_dokter' => 'Poli Anak',
                'alamat_dokter' => 'Jln. HKI Tarutung, Kab. Tapanuli Utara',
                'id_user'=>4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr Sybill',
                'spesialisasi_dokter' => 'Poli Lansia',
                'alamat_dokter' => 'Jln. HKI Tarutung, Kab. Tapanuli Utara',
                'id_user'=>5,
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
