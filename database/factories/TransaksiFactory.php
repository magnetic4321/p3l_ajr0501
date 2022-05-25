<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1,5),
            'driver_id' => $this->faker->numberBetween(null, 4),
            'mobil_id' => $this->faker->numberBetween(1,30),
            'promo_id' => $this->faker->numberBetween(null,5),
            'pegawai_id' => $this->faker->numberBetween(1,5),
            'tanggal_mulai' => $this->faker->dateTimeBetween('-2 week', '-1 week'),
            'tanggal_selesai' => $this->faker->dateTimeBetween('-6 day', '-1 day'),
            'tanggal_pengembalian' => $this->faker->dateTimeBetween('-6 day', '-1 day'),
            'metode_pembayaran' => $this->faker->randomElement(['Uang Tunai', 'Debit', 'Kredit', 'Gopay', 'Shopeepay', 'OVO', 'DANA']),
            'rating_driver' => $this->faker->numberBetween(2,5),
            'penilaian_driver' => $this->faker->text(mt_rand(8,50)),
            'rating_rental' => $this->faker->numberBetween(2,5),
            'penilaian_rental' => $this->faker->text(mt_rand(10,50)),
        ];
    }
}
