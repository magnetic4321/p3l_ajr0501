<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailJadwal;

class DetailJadwalController extends Controller
{
    public function index()
    {
        return view('detailjadwals', [
            "title" => 'Data Detail Jadwal Pegawai blbl',
            "detailjadwals" => DetailJadwal::all()
        ]);
    }

    public function show(DetailJadwal $detailJadwal)
    {
        return view('detailJadwal', [
            "title" => 'Data Detail Jadwal Pegawai',
            "detailJadwal" => $detailJadwal
        ]);
    }
}
