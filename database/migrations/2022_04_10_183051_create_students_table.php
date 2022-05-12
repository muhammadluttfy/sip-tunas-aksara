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
            $table->string('student_detail_id')->nullable();
            $table->string('level_id')->nullable();
            $table->string('father_id')->nullable();
            $table->string('mother_id')->nullable();
            $table->string('mutation_id')->nullable();

            $table->string('role')->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('slug')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('jenis_kelamin')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
