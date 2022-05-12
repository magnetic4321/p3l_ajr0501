<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJadwal extends Model
{
    use HasFactory;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
