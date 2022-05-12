<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles', [
            "title" => 'Role Jabatan',
            "roles" => Role::with('pegawais')->latest()->get()
        ]);
    }

    public function show(Role $role)
    {
        return view('role', [
            "title" => $role->jabatan,
            "role" => $role
        ]);
    }
}
