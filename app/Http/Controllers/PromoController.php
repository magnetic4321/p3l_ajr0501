<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index()
    {
        return view('promos', [
            "title" => 'Data Promo AJR',
            "promos" => Promo::all()
        ]);
    }

    public function show(Promo $promo)
    {
        return view('promo', [
            "title" => $promo->kode,
            "promo" => $promo
        ]);
    }
}
