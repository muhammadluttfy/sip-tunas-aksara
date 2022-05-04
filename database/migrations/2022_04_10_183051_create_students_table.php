<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('level_id')->nullable();
            $table->string('father_id')->nullable();
            $table->string('mother_id')->nullable();
            $table->string('mutation_id')->nullable();
            $table->string('nis')->nullable();

            $table->string('nama_lengkap')->nullable();
            $table->string('nama_panggilan')->nullable();
            $table->string('avatar')->nullable();
            $table->string('kelompok')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('saudara_kandung')->nullable();
            $table->string('saudara_tiri')->nullable();
            $table->string('saudara_angkat')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('imunitas_diterima')->nullable();
            $table->string('ciri_khusus')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('jarak_sekolah_rumah')->nullable();
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
        Schema::dropIfExists('students');
    }
}
