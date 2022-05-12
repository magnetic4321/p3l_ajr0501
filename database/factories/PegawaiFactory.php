<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role_id' => $this->faker->numberBetween(2, 3),
            'user_id' => $this->faker->numberBetween(2, 5),
            'slug' => $this->faker->slug(),
        ];
    }
}
