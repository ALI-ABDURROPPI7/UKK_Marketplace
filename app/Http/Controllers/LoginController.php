<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('login');
    }
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (auth()->Auth::attempt(['email' => $email, 'password' => $password])($credentials)) {
    //         return redirect()->intended(route('produk.index'));
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }
}
