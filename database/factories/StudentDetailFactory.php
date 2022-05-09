<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            // 'no_identitas' => $this->faker->numberBetween(1, 999) . ' / paud / ' . $this->faker->numberBetween(1, 99) . ' ' . $this->faker->numberBetween(1, 9) . ' ' . $this->faker->numberBetween(1, 9),
            // 'nama_lengkap' => $this->faker->name,
            'nama_panggilan' => $this->faker->firstName(),
            // 'avatar' => $this->faker->imageUrl(),
            'kelompok' => $this->faker->randomElement(['A', 'B', 'C']),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            'kewarganegaraan' => $this->faker->randomElement(['WNI', 'WNA']),
            'saudara_kandung' => $this->faker->numberBetween(0, 4),
            'saudara_tiri' => $this->faker->numberBetween(0, 4),
            'saudara_angkat' => $this->faker->numberBetween(0, 4),
            'imunitas_diterima' => $this->faker->randomElement(['Tidak', 'Ya']),
            'bahasa' => 'Sasak Lombok',
            'gol_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'alamat' => $this->faker->address,
            'no_telepon' => $this->faker->phoneNumber,
            'jarak_sekolah_rumah' => $this->faker->numberBetween(0, 10),

        ];
    }
}
