<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Promo;
use App\Models\Mobil;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::latest();

        if(request('search')) {
            $transaksis->where('metode_pembayaran', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.transaksis.index', [
            'transaksis' => $transaksis->get()
        ]);
    }

    public function indexRating()
    {
        return view('dashboard.transaksis.rating', [
            'transaksis' => Transaksi::all()
        ]);
    }

    public function indexVerifikasi()
    {
        return view('dashboard.transaksis.verifikasi', [
            'transaksis' => Transaksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.transaksis.create', [
            'transaksis' => Transaksi::all(),
            'promos' => Promo::all(),
            'drivers' => Driver::all(),
            'users' => User::all(),
            'mobils' => Mobil::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'bukti_pembayaran' => 'image|file|max:5120',
            'mobil_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'metode_pembayaran' => 'required',
        ];

        // @dd($request);

        $validatedData = $request->validate($rules);

        if($request->file('bukti_pembayaran')){
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
        }

        $validatedData['customer_id'] = auth()->user()->customer->id;
        $validatedData['driver_id'] = $request->driver_id;
        $validatedData['pegawai_id'] = '0';
        $validatedData['promo_id'] = $request->promo_id;
        $validatedData['status'] = '0';

        Transaksi::create($validatedData);

        return redirect('/dashboard/transaksis')->with('success', 'Pemesanan success!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('dashboard.transaksis.show', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
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

    }

    public function updateStatus(Request $request, Transaksi $transaksi)
    {
        $rules = [
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['pegawai_id'] = auth()->user()->pegawai->id;

        Transaksi::where('id', $transaksi->id)->update($validatedData);

        return redirect('/dashboard/transaksis')->with('success', 'Status transaksi berhasil diubah');
    }

    public function updateBukti(Request $request, Transaksi $transaksi)
    {
        $rules = [
            'bukti_pembayaran' => 'image|file|max:5120',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('bukti_pembayaran')){
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti-pembayaran-customer');
        }

        // @dd($validatedData['bukti_pembayaran']);

        Transaksi::where('id', $transaksi->id)->update($validatedData);
        return redirect('/dashboard/transaksis')->with('success', 'Bukti pembayaran berhasil diupload');
    }

    public function updateRating(Request $request, Transaksi $transaksi)
    {
        $rules = [
            'rating_driver' => 'required',
            'rating_rental' => 'required',
            'penilaian_driver' => 'required',
            'penilaian_rental' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Transaksi::where('id', $transaksi->id)->update($validatedData);

        return redirect('/dashboard/transaksis')->with('success', 'Penilaian rating berhasil diberikan');
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
