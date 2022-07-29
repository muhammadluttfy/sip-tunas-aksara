<?php

namespace Database\Seeders;

use App\Models\Post;
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
use App\Models\PaudProgram;
use App\Models\Predicate;
use App\Models\ProgramStatus;
use App\Models\RegistrationStatus;
use App\Models\Semester;
use App\Models\StatusProgram;
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

        Student::factory(4)->create();
        StudentDetail::factory(4)->create();
        Father::factory(4)->create();
        Mother::factory(4)->create();
        Mutation::factory(4)->create();
        Post::factory(4)->create();
        Letter::factory(4)->create();

        User::insert([
            [
                'role' => 'Administrator',
                'social_media_id' => 1,
                'no_identitas' => '18083000124',
                'nama_lengkap' => 'Muhammad Lutfi',
                'jabatan' => 'Developer',
                'email' => 'creativedevelopment.id@gmail.com',
                'username' => 'muhammadluttfy',
                'tanggal_lahir' => '2001-01-31',
                'password' => bcrypt('password.'),
                'remember_token' => '',
                'created_at' => now(),
            ],
            [
                'role' => 'Administrator',
                'social_media_id' => 2,
                'no_identitas' => '001/tendik/2022',
                'nama_lengkap' => 'Suriyani,S.Pd',
                'jabatan' => 'Kepala Sekolah',
                'email' => 'suriyani84@gmail.com',
                'username' => 'suriyani_84',
                'tanggal_lahir' => '1996-08-30',
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
                'jenjang_pendidikan' => 'Pindah PAUD',
                'slug' => 'pindah-paud',
            ],
            [
                'jenjang_pendidikan' => 'Lulus PAUD Tunas Aksara',
                'slug' => 'lulus-paud-tunas-aksara',
            ],
        ]);

        SocialMedia::insert([
            [
                'instagram' => 'muhammadluttfy',
                'facebook' => 'Muhammad Lutfi',
                'whatsapp' => '082340378657',
            ],
            [
                'instagram' => 'suriyani_84',
                'facebook' => 'Suriyani 84',
                'whatsapp' => '082340378657',
            ],
            [
                'instagram' => 'dayah.hikmah',
                'facebook' => 'Dayah Hikmah',
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

        PaudProgram::insert([
            [
                'nama_program' => 'KB Tunas Aksara',
                'slug' => 'kb-tunas-aksara',
                'status' => 'Buka',
                'mulai_program' => '2022-06-01',
                'selesai_program' => '2022-08-01',
                'route' => 'registration.createKB',
                'created_at' => now(),
            ],
            [
                'nama_program' => 'TK Tunas Aksara',
                'slug' => 'tk-tunas-aksara',
                'status' => 'Buka',
                'mulai_program' => '2022-06-01',
                'selesai_program' => '2022-08-01',
                'route' => 'registration.createTK',
                'created_at' => now(),
            ],
            [
                'nama_program' => 'Pindahan',
                'slug' => 'pindahan',
                'status' => 'Tutup',
                'mulai_program' => '2022-06-01',
                'selesai_program' => '2022-08-01',
                'route' => 'registration.createPindahan',
                'created_at' => now(),
            ],
        ]);

        RegistrationStatus::insert([
            [
                'status' => 'Proses Seleksi',
                'created_at' => now(),
            ],
            [
                'status' => 'Diterima',
                'created_at' => now(),
            ],
            [
                'status' => 'Ditolak',
                'created_at' => now(),
            ],
        ]);
    }
}
