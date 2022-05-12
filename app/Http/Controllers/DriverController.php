<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index()
    {
        return view('drivers', [
            "title" => 'Data Driver Terdaftar',
            "drivers" => Driver::latest()->get()
        ]);
    }

    public function show(Driver $driver)
    {
        return view('driver', [
            "title" => $driver->nama,
            "driver" => $driver
        ]);
    }
}
