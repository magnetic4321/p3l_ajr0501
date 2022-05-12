<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Driver;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama' => 'required',
            'role' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email:dns|unique:users',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6',
            'slug' => 'required|unique:drivers|unique:customers'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        // @dd($request);
        $userOn = [];
        $userOn['user_id'] = $user->id;
        $userOn['slug'] = $validatedData['slug'];

        // @dd($userOn);

        if($validatedData['role'] == '1'){
            Driver::create($userOn);
        }else if($validatedData['role'] == '2'){
            Customer::create($userOn);
        }
        
        return redirect('/login')->with('success', 'Registration success!!!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Driver::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
