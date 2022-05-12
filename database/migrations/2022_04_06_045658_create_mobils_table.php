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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_id')->constrained('mitras')->onDelete('cascade');
            $table->string('nama');
            $table->string('no_plat')->unique();
            $table->string('no_stnk');
            $table->string('tipe');
            $table->string('fasilitas');
            $table->string('warna');
            $table->integer('kapasitas');
            $table->integer('volume_bagasi');
            $table->string('bahan_bakar');
            $table->date('tanggal_servis')->nullable();
            $table->date('kontrak_mulai')->nullable();
            $table->date('kontrak_selesai')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('mobils');
    }
};
