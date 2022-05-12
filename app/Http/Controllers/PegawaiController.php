<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawais', [
            "title" => 'Data Pegawai Terdaftar',
            "pegawais" => Pegawai::with('role')->latest()->get()
        ]);
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawai', [
            "title" => $pegawai->nama,
            "pegawai" => $pegawai
        ]);
    }
}
