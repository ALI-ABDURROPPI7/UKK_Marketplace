<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    // =======================
    // ADMIN — TAMPILKAN KATEGORI
    // =======================
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    // ADMIN — FORM TAMBAH
    public function create()
    {
        return view('admin.kategori.create');
    }

    // ADMIN — SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Kategori::create([
            'nama' => $request->nama
        ]);

       return redirect('/kategori')->with('success', 'Kategori berhasil ditambah!');

    }

    // ADMIN — FORM EDIT
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    // ADMIN — UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    // ADMIN — HAPUS
    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function memberIndex()
    {
        $kategori = Kategori::all();
        return view('member.kategori.index', compact('kategori'));
    }
    public function indexmember()
    {
        // ambil toko milik user
        $toko = Toko::where('user_id', Auth::id())->first();

        // hitung total produk / jika belum punya toko = 0
        $totalProduk = $toko ? Product::where('toko_id', $toko->id)->count() : 0;

        // ambil produk terbaru (max 5)
        $produkTerbaru = $toko
            ? Product::where('toko_id', $toko->id)->latest()->take(5)->get()
            : [];

        return view('member.index', compact(
            'toko',
            'totalProduk',
            'produkTerbaru'
        ));
    }
}
