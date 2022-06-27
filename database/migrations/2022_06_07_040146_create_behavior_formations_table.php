<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBehaviorFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('behavior_formations', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('predicate_id')->constrained()->nullable();
            $table->string('point_1')->nullable();
            $table->string('point_2')->nullable();
            $table->string('point_3')->nullable();
            $table->string('point_4')->nullable();
            $table->string('point_5')->nullable();
            $table->string('point_6')->nullable();
            $table->string('point_7')->nullable();
            $table->string('point_8')->nullable();
            $table->string('point_9')->nullable();
            $table->string('point_10')->nullable();
            $table->string('point_11')->nullable();
            $table->string('point_12')->nullable();
            $table->string('point_13')->nullable();
            $table->string('point_14')->nullable();
            $table->string('point_15')->nullable();
            $table->string('point_16')->nullable();
            $table->string('point_17')->nullable();
            $table->string('point_18')->nullable();
            $table->string('point_19')->nullable();
            $table->string('point_20')->nullable();
            $table->string('point_21')->nullable();
            $table->string('point_22')->nullable();
            $table->string('point_23')->nullable();
            $table->string('point_24')->nullable();
            $table->string('point_25')->nullable();
            $table->string('point_26')->nullable();
            $table->string('point_27')->nullable();
            $table->string('point_28')->nullable();
            $table->string('point_29')->nullable();
            $table->string('point_30')->nullable();
            $table->string('point_31')->nullable();
            $table->string('point_32')->nullable();
            $table->string('point_33')->nullable();
            $table->string('point_34')->nullable();
            $table->string('point_35')->nullable();
            $table->string('point_36')->nullable();
            $table->string('point_37')->nullable();
            $table->string('point_38')->nullable();
            $table->string('point_39')->nullable();
            $table->string('point_40')->nullable();
            $table->string('point_41')->nullable();
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
        Schema::dropIfExists('behavior_formations');
    }
}
