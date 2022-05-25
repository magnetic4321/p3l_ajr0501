<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mobils = Mobil::latest();

        if(request('search')) {
            $mobils->join('mitras', 'mitras.id', '=', 'mobils.mitra_id')
                ->where('mobils.nama', 'like', '%' . request('search') . '%')
                ->orWhere('mitras.nama', 'like', '%' . request('search') . '%')
                ->orWhere('no_plat', 'like', '%' . request('search') . '%')
                ->orWhere('tipe', 'like', '%' . request('search') . '%')
                ->orWhere('fasilitas', 'like', '%' . request('search') . '%')
                ->select('mobils.*')
                ->get();
        }

        return view('dashboard.mobils.index', [
            'mobils' => $mobils->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mobils.create', [
            'mobils' => Mobil::all(),
            'mitras' => Mitra::all()
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
            'nama' => 'required',
            'tipe' => 'required',
            'mitra_id' => 'required',
            'no_plat' => 'required|unique:mobils',
            'no_stnk' => 'required',
            'fasilitas' => 'required',
            'warna' => 'required',
            'kapasitas' => 'required',
            'volume_bagasi' => 'required',
            'bahan_bakar' => 'required',
        ]);

        Mobil::create($validatedData);

        return redirect('/dashboard/mobils')->with('success', 'Aset mobil berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        return view('dashboard.mobils.show', [
            'mobil' => $mobil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobil $mobil, Mitra $mitra)
    {
        return view('dashboard.mobils.edit', [
            'mobil' => $mobil,
            'mobils' => Mobil::all(),
            'mitra' => $mitra,
            'mitras' => Mitra::all()
        ]);
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
        $rules = [
            'nama' => 'required',
            'tipe' => 'required',
            'mitra_id' => 'required',
            'no_stnk' => 'required',
            'fasilitas' => 'required',
            'warna' => 'required',
            'kapasitas' => 'required',
            'volume_bagasi' => 'required',
            'bahan_bakar' => 'required',
            'kontrak_selesai' => 'required',
        ];

        if($request->no_plat != $mobil->no_plat) {
            $rules['no_plat'] = 'required|unique:mobils';
        }

        $validatedData = $request->validate($rules);

        Mobil::where('no_plat', $mobil->no_plat)->update($validatedData);

        return redirect('/dashboard/mobils')->with('success', 'Data mobil berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        Mobil::destroy($mobil->id);
        return redirect('/dashboard/mobils')->with('success', 'Data mobil berhasil dihapus');
    }
}
