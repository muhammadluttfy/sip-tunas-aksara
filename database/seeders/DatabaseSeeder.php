<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Level;
use App\Models\Father;
use App\Models\Letter;
use App\Models\Mother;
use App\Models\Student;
use App\Models\Mutation;
use App\Models\SocialMedia;
use App\Models\PostCategory;
use App\Models\StudentDetail;
use App\Models\LetterCategory;
use App\Models\Predicate;
use App\Models\Semester;
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

        Student::factory(20)->create();
        StudentDetail::factory(20)->create();
        Father::factory(20)->create();
        Mother::factory(20)->create();
        Mutation::factory(20)->create();
        Post::factory(20)->create();
        Letter::factory(20)->create();

        User::insert([
            [
                'role' => 'Kepala Sekolah',
                'social_media_id' => 1,
                'no_identitas' => '18083000124',
                'nama_lengkap' => 'Suriyani,S.Pd',
                'email' => 'creativedevelopment.id@gmail.com',
                'username' => 'suriyani_84',
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
                'username' => 'dayah.hikmah',
                'tanggal_lahir' => '1996-08-30',
                'email' => 'dayah@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => '',
                'created_at' => now(),
            ],
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
            [
                'jenjang_pendidikan' => 'Lulus',
                'slug' => 'lulus',
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

        PostCategory::insert([
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

        LetterCategory::insert([
            [
                'nama' => 'Surat Pengantar',
                'slug' => 'surat-pengantar',
            ],
            [
                'nama' => 'Surat Keterangan',
                'slug' => 'surat-keterangan',
            ],
            [
                'nama' => 'Surat Keputusan',
                'slug' => 'surat-keputusan',
            ],
            [
                'nama' => 'Surat Undangan',
                'slug' => 'surat-undangan',
            ],
        ]);

        Semester::insert([
            [
                'nama' => 'Semester 1',
            ],
            [
                'nama' => 'Semester 2',
            ],
            [
                'nama' => 'Semester 3',
            ],
            [
                'nama' => 'Semester 4',
            ],
            [
                'nama' => 'Semester 5',
            ],
            [
                'nama' => 'Semester 6',
            ],
            [
                'nama' => 'Semester 7',
            ],
            [
                'nama' => 'Semester 8',
            ],
        ]);

        Predicate::insert([
            [
                'nama' => 'Belum Berkembang (BB)',
                'created_at' => now(),
            ],
            [
                'nama' => 'Mulai Berkembang (MB)',
                'created_at' => now(),
            ],
            [
                'nama' => 'Berkembang Sesuai Harapan (BSH)',
                'created_at' => now(),
            ],
            [
                'nama' => 'Berkembang Sangat Baik (BSB)',
                'created_at' => now(),
            ],
        ]);
    }
}
