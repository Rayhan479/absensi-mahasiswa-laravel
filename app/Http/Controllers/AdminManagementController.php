<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManagementController extends Controller
{
    public function index()
    {
        $admins = User::admin()->get(); // Ambil semua admin
        return view('admin.manajemen-admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.manajemen-admin.tambah-admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Set sebagai admin
        ]);

        return redirect()->route('admin.manajemen-admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }
}
