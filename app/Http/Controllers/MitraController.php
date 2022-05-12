<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;

class MitraController extends Controller
{
    public function index()
    {
        return view('mitras', [
            "title" => 'Data Mitra Terdaftar',
            "mitras" => Mitra::with('mobils')->latest()->get()
        ]);
    }

    public function show(Mitra $mitra)
    {
        return view('mitra', [
            "title" => $mitra->nama,
            "mitra" => $mitra
        ]);
    }
}
