<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailJadwal>
 */
class DetailJadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jadwal_id' => $this->faker->numberBetween(1, 12),
            'pegawai_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
