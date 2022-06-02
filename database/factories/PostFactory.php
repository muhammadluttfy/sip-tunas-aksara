<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
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
            'category_id' => $this->faker->numberBetween(1, 2),
            'judul' => $this->faker->sentence,
            'slug' => $this->faker->slug(mt_rand(1, 3)),
            'konten' => $this->faker->paragraph,
            'kutipan' => $this->faker->sentence(mt_rand(18, 20)),
        ];
    }
}
