<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransaksiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::orderBy('created_at', 'DESC')->get();
        $response = [
            'message' => 'List transaksi order by time',
            'data'  => $transaksis
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function laporanTransaksi()
    {
        $data = [
            'transaksis' => Transaksi::where("created_at",">", Carbon::now()->subMonths(6))->get(),
        ];

        $pdf = \PDF::loadView('dashboard.transaksis.laporanTransaksi', $data);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('laporan.pdf');

        // return view('dashboard.transaksis.laporanTransaksi', [
        //     'transaksis' => Transaksi::where("created_at",">", Carbon::now()->subMonths(6))->get()
        // ]);
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
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
