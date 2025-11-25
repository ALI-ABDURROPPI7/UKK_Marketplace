<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // tampilkan semua user (admin + member)
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'role' => 'required',
        ]);

        User::create([
            'name'      => $request->nama,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name'      => $request->nama,
            'username'  => $request->username,
            'email'     => $request->email,
            'role'      => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus!');
    }
}
