<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raports', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('semester_id')->nullable();

            $table->foreignId('behavior_formation_id')->constrained()->onDelete('cascade');
            $table->foreignId('language_ability_id')->constrained()->onDelete('cascade');
            $table->foreignId('cognitive_id')->constrained()->onDelete('cascade');
            $table->foreignId('physical_motoric_id')->constrained()->onDelete('cascade');
            $table->foreignId('art_id')->constrained()->onDelete('cascade');

            $table->string('tahun_ajaran')->nullable();
            $table->string('tanggal_mulai')->nullable();
            $table->string('tanggal_selesai')->nullable();
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
        Schema::dropIfExists('raports');
    }
}
