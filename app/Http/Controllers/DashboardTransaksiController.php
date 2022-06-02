<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Promo;
use App\Models\Mobil;
use App\Models\Driver;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

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
            $transaksis->select('transaksis.*')
                    ->join('mobils', 'mobils.id', 'transaksis.mobil_id')
                    ->join('customers', 'customers.id', 'transaksis.customer_id')
                    ->join('users', 'users.id', 'customers.user_id')
                    ->join('promos', 'promos.id', 'transaksis.promo_id')
                    ->where('metode_pembayaran', 'like', '%' . request('search') . '%')
                    ->orWhere('users.nama', 'like', '%' . request('search') . '%')
                    ->orWhere('mobils.nama', 'like', '%' . request('search') . '%')
                    ->orWhere('promos.kode', 'like', '%' . request('search') . '%')
                    ->orderBy('id')->get();
        }

        return view('dashboard.transaksis.index', [
            'transaksis' => $transaksis->orderBy('id')->get()
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
            'mobil_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'metode_pembayaran' => 'required',
        ];

        $biaya = [];

        // @dd($request);

        $validatedData = $request->validate($rules);
        $validatedData['customer_id'] = auth()->user()->customer->id;
        $validatedData['driver_id'] = $request->driver_id;
        $validatedData['promo_id'] = $request->promo_id;

        $driver = Driver::where('id', $request->driver_id)->first();
        $mobil = Mobil::where('id', $request->mobil_id)->first();
        $promo = Promo::where('id', $request->promo_id)->first();

        $biaya['biaya_mobil'] = $mobil->tarif * \Carbon\Carbon::parse( $request->tanggal_mulai )->diffInDays( $request->tanggal_selesai );

        // @dd($promo);
        if($request->driver_id != '0' && $request->promo_id != '0'){
            $biaya['biaya_driver'] = $driver->tarif * \Carbon\Carbon::parse( $request->tanggal_mulai )->diffInDays( $request->tanggal_selesai ); 
            $biaya['biaya_diskon'] = ($biaya['biaya_driver'] + $biaya['biaya_mobil']) * $promo->diskon / 100;
            $biaya['biaya_total'] = $biaya['biaya_driver'] + $biaya['biaya_mobil'] - $biaya['biaya_diskon'];
        }elseif($request->driver_id != '0' && $request->promo_id == '0') {
            $biaya['biaya_driver'] = $driver->tarif * \Carbon\Carbon::parse( $request->tanggal_mulai )->diffInDays( $request->tanggal_selesai ); 
            $biaya['biaya_total'] = $biaya['biaya_driver'] + $biaya['biaya_mobil'];
        }elseif($request->driver_id == '0' && $request->promo_id == '0'){
            $biaya['biaya_total'] = $biaya['biaya_mobil'];
        }else{
            $biaya['biaya_diskon'] = $biaya['biaya_mobil'] * $promo->diskon / 100;
            $biaya['biaya_total'] = $biaya['biaya_mobil'] - $biaya['biaya_diskon'];
        }

        $validatedData['biaya'] = $biaya['biaya_total'];

        // @dd($biaya);

        $transaksi = Transaksi::create($validatedData);

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
        // @dd($request);

        if($request['status']){
            $validatedData['status'] = $request['status'];
        }elseif($request['tanggal_pengembalian']){
            $validatedData['tanggal_pengembalian'] = $request['tanggal_pengembalian'];
        }
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

    public function updatePengembalian(Request $request, Transaksi $transaksi)
    {

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
