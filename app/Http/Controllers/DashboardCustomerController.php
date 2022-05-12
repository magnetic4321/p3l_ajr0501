<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.customers.index', [
            'customers' => Customer::all(),
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('dashboard.customers.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, User $user)
    {
        return view('dashboard.customers.edit', [
            'customer' => $customer,
            'customers' => Customer::all(),
            'user' => $user,
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, User $user)
    {
        $rules = [
            'foto' => 'image|file|max:5120',

        ];

        $validatedDataUser = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        if($request->slug != $customer->slug) {
            $rules['slug'] = 'required|unique:customers';
        }

        $validatedData = $request->validate($rules);
        $validatedData['no_sim'] = $request->no_sim;
        $validatedData['no_ktp'] = $request->no_ktp;

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('foto-customer');
        }

        @dd($validatedData['foto']);

        Customer::where('slug', $customer->slug)->update($validatedData);
        User::where('id', $customer->user_id)->update($validatedDataUser);

        return redirect('/dashboard')->with('success', 'Data customer berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Customer::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
