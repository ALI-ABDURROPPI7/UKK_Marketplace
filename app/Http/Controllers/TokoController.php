<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\User;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::all();
        return view('admin.toko.index', compact('toko'));
    }

    public function create()
    {
        // Ambil semua member sebagai calon pemilik toko
        $users = User::all(); // kalau ada role member, pakai ->where('role', 'member')

        return view('admin.toko.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'user_id' => 'required',      // Pemilik toko
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload Foto
        $fotoName = null;
        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('foto_toko'), $fotoName);
        }

        Toko::create([
            'nama_toko' => $request->nama_toko,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoName,
            'user_id' => $request->user_id,   // Simpan pemilik toko
        ]);

        return redirect()->route('toko.index')->with('success', 'Toko berhasil ditambahkan');
    }

    public function edit($id)
    {
        $toko = Toko::findOrFail($id);
        $users = User::all();

        return view('admin.toko.edit', compact('toko', 'users'));
    }

    public function update(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);

        $request->validate([
            'nama_toko' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'user_id' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Update Foto Jika Ada
        if ($request->hasFile('foto')) {

            if ($toko->foto && file_exists(public_path('foto_toko/' . $toko->foto))) {
                unlink(public_path('foto_toko/' . $toko->foto));
            }

            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('foto_toko'), $fotoName);

            $toko->foto = $fotoName;
        }

        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->kontak = $request->kontak;
        $toko->deskripsi = $request->deskripsi;
        $toko->user_id = $request->user_id;

        $toko->save();

        return redirect()->route('toko.index')->with('success', 'Toko berhasil diupdate');
    }

    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);

        if ($toko->foto && file_exists(public_path('foto_toko/' . $toko->foto))) {
            unlink(public_path('foto_toko/' . $toko->foto));
        }

        $toko->delete();

        return redirect()->route('toko.index')->with('success', 'Toko berhasil dihapus');
    }

    // TAMPIL TOKO UNTUK MEMBER
    public function memberIndex()
    {
        $toko = Toko::all();
        return view('member.toko.index', compact('toko'));
    }
}
