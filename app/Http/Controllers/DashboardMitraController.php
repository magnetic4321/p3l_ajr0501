<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mitras.index', [
            'mitras' => Mitra::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mitras.create', [
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
            'slug' => 'required|unique:mitras',
            'alamat' => 'required',
            'no_telp' => 'required',
            'no_ktp' => 'required'
        ]);

        Mitra::create($validatedData);

        return redirect('/dashboard/mitras')->with('success', 'Data mitra baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function show(Mitra $mitra)
    {
        return view('dashboard.mitras.show', [
            'mitra' => $mitra
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function edit(Mitra $mitra)
    {
        return view('dashboard.mitras.edit', [
            'mitra' => $mitra,
            'mitras' => Mitra::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mitra $mitra)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required'
        ];

        if($request->slug != $mitra->slug) {
            $rules['slug'] = 'required|unique:mitras';
        }

        $validatedData = $request->validate($rules);

        Mitra::where('slug', $mitra->slug)->update($validatedData);

        return redirect('/dashboard/mitras')->with('success', 'Data mitra berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        Mitra::destroy($mitra->id);
        return redirect('/dashboard/mitras')->with('success', 'Data mitra berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Mitra::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
