<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'level_id' => $this->faker->numberBetween(1, 2),
            'father_id' => 1,
            'mother_id' => 1,
            // 'nis' => $this->faker->numberBetween(1, 999) . ' / paud / ' . $this->faker->numberBetween(1, 99) . ' ' . $this->faker->numberBetween(1, 9) . ' ' . $this->faker->numberBetween(1, 9),
            'nis' => '001/paud/22',
            'nama_lengkap' => $this->faker->name,
            'nama_panggilan' => $this->faker->firstName(),
            'avatar' => $this->faker->imageUrl(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            'kewarganegaraan' => $this->faker->randomElement(['WNI', 'WNA']),

        ];
    }
}
