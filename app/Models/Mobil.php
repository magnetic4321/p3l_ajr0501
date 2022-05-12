<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    public function getRouteKeyName()
    {
        return 'no_plat';
    }
}
