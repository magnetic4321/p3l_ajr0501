<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class MobilApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobils = Mobil::orderBy('tipe', 'ASC')->get();
        $response = [
            'message' => 'List mobil order by time',
            'data'  => $mobils
        ];

        $data = [
            'mobils' => $mobils
        ];

        $pdf = PDF::loadView('dashboard.transaksis.mobilList', $data);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->download('mobil-list.pdf');

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobil $mobil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        //
    }
}
