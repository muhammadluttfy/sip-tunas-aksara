<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaudProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paud_programs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->string('slug');
            $table->string('status');
            $table->string('mulai_program');
            $table->string('selesai_program');
            $table->string('route');
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
        Schema::dropIfExists('paud_programs');
    }
}
