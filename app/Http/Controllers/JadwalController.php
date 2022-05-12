<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\DetailJadwal;

class JadwalController extends Controller
{
    public function index()
    {
        return view('jadwals', [
            "title" => 'Data Jadwal Pegawai',
            "jadwals" => Jadwal::all(),
            "detail_jadwals" => DetailJadwal::all()

        ]);
    }

    public function show(Jadwal $jadwal, DetailJadwal $detail_jadwal)
    {
        return view('jadwal', [
            "title" => $jadwal->hari,
            "jadwal" => $jadwal,
            "detail_jadwal" => $detail_jadwal
        ]);
    }
}
