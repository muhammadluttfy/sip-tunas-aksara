<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_abilities', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('predicate_id')->constrained()->nullable();
            $table->string('point_1');
            $table->string('point_2');
            $table->string('point_3');
            $table->string('point_4');
            $table->string('point_5');
            $table->string('point_6');
            $table->string('point_7');
            $table->string('point_8');
            $table->string('point_9');
            $table->string('point_10');
            $table->string('point_11');
            $table->string('point_12');
            $table->string('point_13');
            $table->string('point_14');
            $table->string('point_15');
            $table->string('point_16');
            $table->string('point_17');
            $table->string('point_18');
            $table->string('point_19');
            $table->string('point_20');
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
        Schema::dropIfExists('language_abilities');
    }
}
