<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('driver_id')->nullable();
            $table->foreignId('mobil_id');
            $table->foreignId('promo_id')->nullable();
            $table->foreignId('pegawai_id')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->boolean('status')->default('1');
            $table->string('metode_pembayaran');
            $table->float('rating_driver')->nullable();
            $table->text('penilaian_driver')->nullable();
            $table->float('rating_rental')->nullable();
            $table->text('penilaian_rental')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
