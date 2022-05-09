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
            'student_detail_id' => $this->faker->numberBetween(1, 10),
            'level_id' => $this->faker->numberBetween(1, 2),
            'father_id' => $this->faker->numberBetween(1, 10),
            'mother_id' => $this->faker->numberBetween(1, 10),
            'no_identitas' => $this->faker->unique()->randomNumber(9),
            'nama_lengkap' => $this->faker->name,
            'slug' => $this->faker->unique()->slug,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'avatar' => $this->faker->imageUrl(),
        ];
    }
}
