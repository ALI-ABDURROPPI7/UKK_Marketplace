<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberProductController extends Controller
{
    // ==============================
    // CEK TOKO MILIK MEMBER
    // ==============================
    private function findMemberToko($toko_id)
    {
        return Toko::where('id', $toko_id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();
    }

    // ==============================
    // LIST PRODUK TOKO MEMBER
    // ==============================
    public function index($toko_id)
    {
        $toko = $this->findMemberToko($toko_id);

        $produk = Product::where('toko_id', $toko->id)->get();

        return view('member.produk.produk', compact('produk', 'toko'));
    }

    // ==============================
    // FORM TAMBAH PRODUK
    // ==============================
    public function create($toko_id)
    {
        $toko = $this->findMemberToko($toko_id);
        $kategori = Kategori::all();

        return view('member.produk.create', compact('kategori', 'toko'));
    }

    // ==============================
    // SIMPAN PRODUK
    // ==============================
    public function store(Request $request, $toko_id)
    {
        $toko = $this->findMemberToko($toko_id);

        $request->validate([
            'nama'        => 'required',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required',
        ]);

        Product::create([
            'nama'        => $request->nama,     // kolom benar
            'harga'       => $request->harga,    // kolom benar
            'kategori_id' => $request->kategori_id,
            'toko_id'     => $toko->id,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('member.produk.index', $toko->id)
                         ->with('success', 'Produk berhasil ditambahkan');
    }

    // ==============================
    // FORM EDIT PRODUK
    // ==============================
    public function edit($toko_id, $id)
    {
        $toko = $this->findMemberToko($toko_id);

        $produk = Product::where('toko_id', $toko->id)->findOrFail($id);
        $kategori = Kategori::all();

        return view('member.produk.edit', compact('produk', 'kategori', 'toko'));
    }

    // ==============================
    // UPDATE PRODUK
    // ==============================
    public function update(Request $request, $toko_id, $id)
    {
        $toko = $this->findMemberToko($toko_id);

        $produk = Product::where('toko_id', $toko->id)->findOrFail($id);

        $request->validate([
            'nama'        => 'required',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required',
        ]);

       $produk->update([
    'nama' => $request->nama,
    'harga' => $request->harga,
    'kategori_id' => $request->kategori_id,
]);


       return redirect()->route('member.produk.index', $toko)
                 ->with('success', 'Produk berhasil diupdate!');

    }

    public function destroy($toko_id, $id)
    {
        $toko = $this->findMemberToko($toko_id);

        $produk = Product::where('toko_id', $toko->id)->findOrFail($id);
        $produk->delete();

        return redirect()->route('member.produk.index', $toko->id)
                         ->with('success', 'Produk berhasil dihapus');
    }
}
