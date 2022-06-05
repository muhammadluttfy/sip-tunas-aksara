<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('letter_category_id')->nullable();
            $table->string('slug')->nullable();

            $table->string('asal_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('perihal')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('tipe_surat')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('letters');
    }
}
