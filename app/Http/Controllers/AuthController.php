<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // FORM LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role === 'member') {
                return redirect()->route('member.dashboard');
            }

            return back()->with('error', 'Akun tidak memiliki role yang valid');
        }

        return back()->with('error', 'username atau password salah');
    }


    // ===== REGISTER =====
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member', // otomatis MEMBER
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login');
    }


    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
