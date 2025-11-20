<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::all();
        return view('admin.toko.index', compact('toko'));
    }

    public function create()
    {
        return view('admin.toko.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
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
        ]);

        return redirect()->route('toko.index')->with('success', 'Toko berhasil ditambahkan');
    }

    public function edit($id)
{
    $toko = Toko::findOrFail($id);
    return view('admin.toko.edit', compact('toko'));
}

public function update(Request $request, $id)
{
    $toko = Toko::findOrFail($id);

    $request->validate([
        'nama_toko' => 'required',
        'alamat' => 'required',
        'kontak' => 'required',
        'deskripsi' => 'required',
        'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // jika upload foto baru
    if ($request->hasFile('foto')) {

        // hapus foto lama
        if ($toko->foto && file_exists(public_path('foto_toko/' . $toko->foto))) {
            unlink(public_path('foto_toko/' . $toko->foto));
        }

        $fotoName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('foto_toko'), $fotoName);

        $toko->foto = $fotoName;
    }

    // update data
    $toko->nama_toko = $request->nama_toko;
    $toko->alamat = $request->alamat;
    $toko->kontak = $request->kontak;
    $toko->deskripsi = $request->deskripsi;
    $toko->save();

    return redirect()->route('toko.index')->with('success', 'Toko berhasil diupdate');
}


    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);

        // hapus foto jika ada
        if ($toko->foto && file_exists(public_path('foto_toko/' . $toko->foto))) {
            unlink(public_path('foto_toko/' . $toko->foto));
        }

        $toko->delete();

        return redirect()->route('toko.index')->with('success', 'Toko berhasil dihapus');
    }

    public function memberIndex()
{
    // Semua toko yang sudah dibuat admin
    $toko = Toko::all();

    return view('member.toko.index', compact('toko'));
}

}
