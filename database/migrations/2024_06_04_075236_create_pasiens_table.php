<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pasien');
            $table->integer('umur_pasien')->default(0);
            $table->string('NIK')->nullable();
            $table->string('alamat_pasien')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->date('tgl_datang')->nullable();
            $table->string('nama_obat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('status')->nullable();
            $table->text('keluhan_pasien')->nullable();
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->unsignedBigInteger('obat_id')->nullable();
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
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
        Schema::dropIfExists('pasiens');
    }
}
