<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FatherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            'kewarganegaraan' => $this->faker->randomElement(['WNI', 'WNA']),
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']),
            'pekerjaan' => $this->faker->jobTitle,
            'alamat' => $this->faker->address,
            'no_telepon' => $this->faker->phoneNumber,
        ];
    }
}
