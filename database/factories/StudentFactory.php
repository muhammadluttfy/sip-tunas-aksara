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
            'student_detail_id' => $this->faker->numberBetween(1, 4),
            'level_id' => $this->faker->numberBetween(1, 2),
            'father_id' => $this->faker->numberBetween(1, 4),
            'mother_id' => $this->faker->numberBetween(1, 4),
            'registration_status_id' => $this->faker->numberBetween(1, 3),

            'role' => 'Student',
            'no_identitas' => $this->faker->unique()->randomNumber(9),
            'nama_lengkap' => $this->faker->name,
            'username' => strtolower($this->faker->firstName() . '-' . $this->faker->lastName()),
            'email' => strtolower($this->faker->firstName() . '.' . $this->faker->lastName()) . '@gmail.com',
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'password' => bcrypt('password'),
        ];
    }
}
