<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    // Menampilkan profil admin
    public function showProfile()
    {
        $admin = Auth::user(); // Mendapatkan data admin yang sedang login
        return view('admin.profil', compact('admin'));
    }

    // Memperbarui profil admin
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = Auth::user(); // Mendapatkan data admin yang sedang login
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profil.show')->with('success', 'Profil berhasil diperbarui.');
    }
}


