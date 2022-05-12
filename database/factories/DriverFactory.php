<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(2, 5),
            'slug' => $this->faker->slug(),
            'bahasa' => $this->faker->boolean(),
            'status_ketersediaan' => $this->faker->boolean(),
            'no_sim' => $this->faker->e164PhoneNumber(),
            'no_ktp' => $this->faker->nik(),
            'tarif' => $this->faker->randomElement(['100000', '120000', '150000', '2000000', '2100000', '155000', '165000'])
        ];
    }

            /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
