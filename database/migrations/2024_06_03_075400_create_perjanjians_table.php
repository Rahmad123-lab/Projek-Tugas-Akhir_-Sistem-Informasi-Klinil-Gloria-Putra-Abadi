<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerjanjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('perjanjians', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pasien');
        $table->unsignedBigInteger('pasien_id');
        $table->unsignedBigInteger('dokter_id'); // Kolom 'dokter_id' digunakan
        $table->unsignedBigInteger('apoteker_id')->nullable();
        $table->string('nama_dokter');
        $table->string('spesialisasi_dokter')->nullable();
        $table->string('waktu_perjanjian');
        $table->integer('umur_pasien');
        $table->string('alamat_pasien');
        $table->string('riwayat_alergi')->nullable();
        $table->date('tanggal_pemeriksaan')->nullable();
        $table->string('keluhan')->nullable();
        $table->string('diagnosis')->nullable();
        $table->string('terapis')->nullable();
        $table->string('resep_obat')->nullable();
        $table->timestamps();

        $table->foreign('pasien_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
        $table->foreign('apoteker_id')->references('id')->on('apotekers')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perjanjians');
    }
}
