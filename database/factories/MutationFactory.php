<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MutationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'diterima_tanggal' => $this->faker->date(),
            'ditempatkan_di_kelompok' => $this->faker->randomElement(['A', 'B', 'C']),
            'instansi_asal' => 'PAUD Maysyafa',
            'tgl_meninggalkan_instansi' => $this->faker->date(),
            'alasan' => $this->faker->sentence(),
        ];
    }
}
