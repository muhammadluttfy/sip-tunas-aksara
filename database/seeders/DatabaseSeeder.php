<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Level;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Student;
use App\Models\Mutation;
use App\Models\Position;
use App\Models\StudentDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Student::factory(10)->create();
        StudentDetail::factory(10)->create();
        Father::factory(10)->create();
        Mother::factory(10)->create();
        Mutation::factory(10)->create();

        User::insert([
            [
                'role' => 'Kepala Sekolah',
                'no_identitas' => '18083000124',
                'nama_lengkap' => 'Muhammad Lutfi',
                'slug' => 'muhammad-lutfi',
                'email' => 'creativedevelopment.id@gmail.com',
                'password' => bcrypt('password'),
                'avatar' => 'https://i.pravatar.cc/300',
                'remember_token' => '',
                'created_at' => now(),
            ],
            [
                'role' => 'Administrator',
                'no_identitas' => '18083000125',
                'nama_lengkap' => 'Nurhidayatul Hikmah',
                'slug' => 'nurhidayatul-hikmah',
                'email' => 'dayah@gmail.com',
                'password' => bcrypt('password'),
                'avatar' => 'https://i.pravatar.cc/300',
                'remember_token' => '',
                'created_at' => now(),
            ],
        ]);

        // Role::insert([
        //     // ['name' => 'Ketua Yayasan',],
        //     ['name' => 'Kepala Sekolah',],
        //     ['name' => 'Administrator',],
        //     ['name' => 'Tenaga Pendidik',],
        // ]);

        Level::insert([
            [
                'jenjang_pendidikan' => 'KB Tunas Aksara',
                'slug' => 'kb-tunas-aksara',
            ],
            [
                'jenjang_pendidikan' => 'TK Tunas Aksara',
                'slug' => 'tk-tunas-aksara',
            ],
        ]);
    }
}
