<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobil>
 */
class MobilFactory extends Factory
{

    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        return [
            'mitra_id' => $faker->numberBetween(1, 10),
            'nama' => $faker->vehicle(),
            'no_plat' => $faker->vehicleRegistration('[A-Z]{2}-[0-9]{4}-[A-Z]{2}'),
            'no_stnk' => $faker->vin(),
            'tipe' => $faker->vehicleType(),
            'fasilitas' => implode(', ', $faker->randomElements(['AC', 'Media Player', 'Air Bag', 'Safety Measure', 'Rear Camera', 'Wifi'], mt_rand(1, 4))),
            'tarif' => $faker->randomElement(['100000', '120000', '150000', '200000', '210000', '155000', '165000']),
            'warna' => $faker->safeColorName(),
            'kapasitas' => $faker->vehicleSeatCount(),
            'volume_bagasi' => $faker->numberBetween(0, 10),
            'bahan_bakar' => $faker->vehicleFuelType(),
            'tanggal_servis' => $faker->dateTimeBetween('-120 week', '-20 week'),
            'kontrak_mulai' => $faker->dateTimeBetween('-100 week', '-10 week'),
            'kontrak_selesai' => $faker->dateTimeBetween('-5 week', '+100 week'),
        ];
    }
}
