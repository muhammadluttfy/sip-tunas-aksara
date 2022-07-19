<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('social_media_id')->nullable();
            $table->string('role')->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('username')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
