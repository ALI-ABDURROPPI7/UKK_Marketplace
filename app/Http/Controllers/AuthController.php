<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        // CEK ROLE
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->role === 'member') {
            return redirect()->route('member.dashboard');
        }

        // Jika role tidak dikenali
        return back()->with('error', 'Akun tidak memiliki role yang valid');
    }

    return back()->with('error', 'username atau password salah');
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
