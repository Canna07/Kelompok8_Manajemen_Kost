<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === 'admin' && $request->password === 'admin') {
            return redirect()->route('dashboard');
        }

        $penghuni = Penghuni::where('nama', $request->username)
                            ->where('no_hp', $request->password)
                            ->first();

        if ($penghuni) {
            return redirect()->route('dashboard-penyewa', ['id' => $penghuni->id]);
        }

        return back()->withErrors([
            'login' => 'Username atau password salah'
        ])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush(); // Hapus session
        return redirect()->route('login');
    }
}
