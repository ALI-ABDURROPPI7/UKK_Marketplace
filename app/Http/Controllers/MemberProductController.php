<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberProductController extends Controller
{
    // TAMPIL PRODUK MILIK MEMBER
    public function index()
    {
        $produk = Product::where('user_id', Auth::id())->get();
        return view('member.produk.produk', compact('produk'));
    }

    // FORM TAMBAH PRODUK
    public function create()
    {
        $kategori = Kategori::all();
        $toko = Toko::all(); // toko dari admin

        return view('member.produk.create', compact('kategori', 'toko'));
    }

    // SIMPAN PRODUK
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'harga'     => 'required|numeric',
            'kategori_id' => 'required',
            'toko_id'     => 'required',
        ]);

        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'toko_id' => $request->toko_id,
            'user_id' => Auth::id(), // produk milik member
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // FORM EDIT PRODUK
    public function edit($id)
    {
        $produk = Product::where('user_id', Auth::id())->findOrFail($id);

        $kategori = Kategori::all();
        $toko = Toko::all();

        return view('member.produk.edit', compact('produk', 'kategori', 'toko'));
    }

    // UPDATE PRODUK
    public function update(Request $request, $id)
    {
        $produk = Product::where('user_id', Auth::id())->findOrFail($id);

        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
    }

    // HAPUS PRODUK
    public function destroy($id)
    {
        $produk = Product::where('user_id', Auth::id())->findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
