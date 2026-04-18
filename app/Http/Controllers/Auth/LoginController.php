<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Officer;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Jika sudah login, jangan boleh ke halaman login lagi, lempar ke admin
        if (Auth::check()) {
            return redirect('/admin');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Cari User berdasarkan Name dan Member ID (password field)
        $user = Officer::where('name', $request->name)
            ->where('member_id', $request->password)
            ->first();
        // if ($user) {
        //     Auth::login($user); // Login secara resmi
        //     $request->session()->regenerate(); // KUNCI SESI: Agar tidak dianggap anonim
        //     // Alihkan ke rute bernama admin.dashboard
        //     return redirect()->route('admin.dashboard');
        // }
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect('/admin'); // atau route('admin.dashboard')
        }

        // Jika gagal, kirim pesan error yang JELAS
        return back()->withErrors([
            'loginError' => 'Authentication failed. Please check your Name and IEEE ID.',
        ])->withInput($request->only('name'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}