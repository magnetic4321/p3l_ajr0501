<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function index()
    {
        return view('mobils', [
            "title" => 'Data Mobil Terdaftar',
            "mobils" => Mobil::with('mitra')->latest()->get()
        ]);
    }

    public function show(Mobil $mobil)
    {
        return view('mobil', [
            "title" => $mobil->nama,
            "mobil" => $mobil
        ]);
    }
}
