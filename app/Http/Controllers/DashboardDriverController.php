<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        // $drivers = Driver::latest();

        // if(request('search')) {
        //     $drivers->where('nama', 'like', '%' . request('search') . '%');
        // }

        return view('dashboard.drivers.index', [
            'drivers' => Driver::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('dashboard.drivers.show', [
            'driver' => $driver
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver, User $user)
    {
        return view('dashboard.drivers.edit', [
            'driver' => $driver,
            'drivers' => Driver::all(),
            'user' => $user,
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver, User $user)
    {
        $rules = [
            'foto' => 'image|file|max:5120',
            'napza' => 'image|file|max:5120',
            'surat_kejiwaan' => 'image|file|max:5120',
            'skck' => 'image|file|max:5120',
            'tarif' => 'required',
            'no_ktp' => 'required',
            'no_sim' => 'required',
            // 'bahasa' => 'required',
        ];

        // @dd($request);

        $validatedDataUser = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
        

        if($request->slug != $driver->slug) {
            $rules['slug'] = 'required|unique:drivers';
        }

        $validatedData = $request->validate($rules);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('foto-driver');
        }

        if($request->file('napza')){
            $validatedData['napza'] = $request->file('napza')->store('foto-napza-driver');
        }

        if($request->file('skck')){
            $validatedData['skck'] = $request->file('skck')->store('foto-skck-driver');
        }

        if($request->file('surat_kejiwaan')){
            $validatedData['surat_kejiwaan'] = $request->file('surat_kejiwaan')->store('foto-surat_kejiwaan-driver');
        }

        Driver::where('slug', $driver->slug)->update($validatedData);
        User::where('id', $driver->user_id)->update($validatedDataUser);

        return redirect('/dashboard')->with('success', 'Data driver berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Driver::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
