<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LetterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'letter_category_id' => $this->faker->numberBetween(1, 4),
            'slug' => $this->faker->slug,
            'tanggal_surat' => $this->faker->date(),
            'asal_surat' => $this->faker->word,
            'no_surat' => $this->faker->word,
            'tipe_surat' => $this->faker->randomElement(['Surat Masuk', 'Surat Keluar']),
            'perihal' => $this->faker->word,
            'tujuan' => $this->faker->word,
            'keterangan' => $this->faker->word,
        ];
    }
}
