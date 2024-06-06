<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('alamat_dokter')->default('Alamat belum diisi'); // Ubah di sini
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama_dokter');
            $table->string('spesialisasi_dokter')->default();
            $table->string('jadwal_dokter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokters');
    }
}
