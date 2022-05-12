<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Driver;
use App\Models\Mitra;
use App\Models\Promo;
use App\Models\Role;
use App\Models\Jadwal;
use App\Models\Pegawai;
use App\Models\Mobil;
use App\Models\DetailJadwal;
use App\Models\Transaksi;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'nama' => 'Edward Sebastian',
            'role' => '3',
            'jenis_kelamin' => 'Male',
            'email' => 'edward.sebastian18@gmail.com',
            'alamat' => 'Jl. Tambakan no.18 Muntilan, 56412',
            'tanggal_lahir' => '1999-03-18',
            'no_telp' => '087834413607',
            'password' => bcrypt('123123'),
        ]);
        
        \App\Models\User::factory(13)->create();
        Customer::factory(5)->create();
        Driver::factory(4)->create();
        Mitra::factory(12)->create();
        Mobil::factory(80)->create();
        DetailJadwal::factory(15)->create();
        Transaksi::factory(40)->create();

        // 

        Pegawai::create([
            'role_id' => '1',
            'user_id' => '1',
            'slug' => 'edward-sebastian',
        ]);
        Pegawai::create([
            'role_id' => '2',
            'user_id' => '11',
            'slug' => 'pegawai_dua',
        ]);
        Pegawai::create([
            'role_id' => '2',
            'user_id' => '12',
            'slug' => 'pegawai_tiga',
        ]);
        Pegawai::create([
            'role_id' => '3',
            'user_id' => '13',
            'slug' => 'pegawai_empat',
        ]);
        Pegawai::create([
            'role_id' => '3',
            'user_id' => '14',
            'slug' => 'pegawai_lima',
        ]);

        // Pegawai::factory(4)->create();

        // 

        Role::create([
            'id' => '1',
            'jabatan' => 'Manager'
        ]);
        Role::create([
            'id' => '2',
            'jabatan' => 'Administrator'
        ]);
        Role::create([
            'id' => '3',
            'jabatan' => 'Customer Service'
        ]);

        // 
        
        Jadwal::create([
            'hari' => 'Senin',
            'shift' => '1'
        ]);
        Jadwal::create([
            'hari' => 'Senin',
            'shift' => '2'
        ]);
        Jadwal::create([
            'hari' => 'Selasa',
            'shift' => '1'
        ]);
        Jadwal::create([
            'hari' => 'Selasa',
            'shift' => '2'
        ]);
        Jadwal::create([
            'hari' => 'Rabu',
            'shift' => '1'
        ]);
        Jadwal::create([
            'hari' => 'Rabu',
            'shift' => '2'
        ]);
        Jadwal::create([
            'hari' => 'Kamis',
            'shift' => '1'
        ]);
        Jadwal::create([
            'hari' => 'Kamis',
            'shift' => '2'
        ]);
        Jadwal::create([
            'hari' => 'Jumat',
            'shift' => '1'
        ]);
        Jadwal::create([
            'hari' => 'Jumat',
            'shift' => '2'
        ]);
        Jadwal::create([
            'hari' => 'Sabtu',
            'shift' => '1'
        ]);
        Jadwal::create([
            'hari' => 'Minggu',
            'shift' => '2'
        ]);

        // 

        Promo::create([
            'kode' => 'BDAY',
            'keterangan' => 'Promo Ulang Tahun',
            'diskon' => '25',
            'status' => '1'
        ]);
        Promo::create([
            'kode' => 'WKND',
            'keterangan' => 'Promo berlaku pada saat weekend',
            'diskon' => '10',
            'status' => '1'
        ]);
        Promo::create([
            'kode' => 'WKDS',
            'keterangan' => 'Promo berlaku pada saat weekdays',
            'diskon' => '20',
            'status' => '1'
        ]);
        Promo::create([
            'kode' => 'GPAY',
            'keterangan' => 'Promo berlaku untuk pembayaran melalui Gopay',
            'diskon' => '20',
            'status' => '1'
        ]);
        Promo::create([
            'kode' => 'SPPY',
            'keterangan' => 'Promo berlaku untuk pembayaran melalui Shopeepay',
            'diskon' => '18',
            'status' => '1'
        ]);
    }
}