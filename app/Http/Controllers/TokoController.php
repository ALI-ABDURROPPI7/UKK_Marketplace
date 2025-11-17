<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    //
    public function index()
    {
        $toko = Toko::with('user')->get();
        return view('admin.toko.index', compact('toko'));
    }

    public function create()
    {
        $users = User::where('role', 'member')->get();
        return view('admin.toko.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'user_id' => 'required',
        ]);

        Toko::create($request->all());

        return redirect()->route('toko.index')->with('success', 'Toko berhasil ditambahkan!');
    }
}
