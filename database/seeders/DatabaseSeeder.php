<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Level;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Student;
use App\Models\Mutation;
use App\Models\Position;
use App\Models\Post;
use App\Models\SocialMedia;
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
        Post::factory(10)->create();

        User::insert([
            [
                'role' => 'Kepala Sekolah',
                'social_media_id' => 1,
                'no_identitas' => '18083000124',
                'nama_lengkap' => 'Muhammad Lutfi',
                'email' => 'creativedevelopment.id@gmail.com',
                'username' => 'muhammad-lutfi',
                'tanggal_lahir' => '1996-08-30',
                'password' => bcrypt('password'),
                'remember_token' => '',
                'created_at' => now(),
            ],
            [
                'role' => 'Administrator',
                'social_media_id' => 2,
                'no_identitas' => '18083000125',
                'nama_lengkap' => 'Nurhidayatul Hikmah',
                'username' => 'nurhidayatul-hikmah',
                'tanggal_lahir' => '1996-08-30',
                'email' => 'dayah@gmail.com',
                'password' => bcrypt('password'),
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

        SocialMedia::insert([
            [
                'instagram' => 'muhammadluttfy',
                'facebook' => 'Muhammad Lutfi',
                'whatsapp' => '082340378657',
            ],
            [
                'instagram' => 'ochnafis',
                'facebook' => 'Ahla Ainin',
                'whatsapp' => '082340378657',
            ],
        ]);

        Category::insert([
            [
                'nama' => 'Informasi Libur',
                'slug' => 'informasi-libur',
            ],
            [
                'nama' => 'Pengumuman',
                'slug' => 'pengumuman',
            ],
            [
                'nama' => 'Event',
                'slug' => 'event',
            ],
        ]);
    }
}
