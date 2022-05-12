<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers', [
            "title" => 'Data Customer Terdaftar',
            "customers" => Customer::latest()->get()
        ]);
    }

    public function show(Customer $customer)
    {
        return view('customer', [
            "title" => $customer->nama,
            "customer" => $customer
        ]);
    }
}
