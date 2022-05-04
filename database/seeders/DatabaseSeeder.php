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

        Student::factory(5)->create();
        Father::factory(5)->create();
        Mother::factory(5)->create();
        Mutation::factory(5)->create();

        User::create([
            'name' => 'Nurhidayatul Hikmah',
            'role_id' => 1,
            'avatar' => 'https://i.pravatar.cc/300',
            'email' => 'creativedevelopment.id@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Role::insert([
            // ['name' => 'Ketua Yayasan',],
            ['name' => 'Kepala Sekolah',],
            ['name' => 'Administrator',],
            ['name' => 'Tenaga Pendidik',],
        ]);

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
