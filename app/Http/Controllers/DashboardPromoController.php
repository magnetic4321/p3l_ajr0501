<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class DashboardPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $promos = Promo::latest();

        if(request('search')) {
            $promos->where('kode', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.promos.index', [
            'promos' => Promo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.promos.create', [
            'promos' => Promo::all()
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
        $validatedData = $request->validate([
            'kode' => 'required|unique:promos',
            'keterangan' => 'required',
            'diskon' => 'required'        
        ]);

        Promo::create($validatedData);

        return redirect('/dashboard/promos')->with('success', 'Promo berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('dashboard.promos.edit', [
            'promo' => $promo,
            'promos' => Promo::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $rules = [
            'keterangan' => 'required',
            'diskon' => 'required'        
        ];

        if($request->kode != $promo->kode) {
            $rules['kode'] = 'required|unique:promos';
        }

        $validatedData = $request->validate($rules);

        Promo::where('kode', $promo->kode)->update($validatedData);

        return redirect('/dashboard/promos')->with('success', 'Promo berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $validatedData['status'] = '2';
        Promo::where('id', $promo->id)->update($validatedData);
        return redirect('/dashboard/promos')->with('success', 'Promo berhasil dihapus');
    }
}
