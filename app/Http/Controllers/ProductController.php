<?php

namespace App\Http\Controllers;

use App\Models\GambarProduk;
use App\Models\kategori;
use App\Models\Product;
use App\Models\Toko;;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produks = Product::with(['kategori','toko'])->orderBy('id','DESC')->get();

        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = kategori::all();
    $toko = Toko::all(); // ambil semua toko admin

    return view('member.produk.create', compact('kategori', 'toko'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request, $toko_id)
    {
        $request->validate([
            'nama'        => 'required',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required',
            'gambar.*'    => 'image|max:4096'
        ]);

        // Ambil toko milik member
        $toko = Auth::user()->toko;

        if (!$toko) {
            return back()->with('error', 'Anda belum memiliki toko.');
        }

        // Simpan produk
        $produk = Product::create([
            'nama'         => $request->nama,
            'harga'        => $request->harga,
            'kategori_id'  => $request->kategori_id,
            'toko_id'      => $toko->id,
            'user_id'      => Auth::id(), // WAJIB ADA
        ]);

        // Simpan gambar ke storage dan DB
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {

                $namaFile = time() . rand() . '.' . $file->extension();

                // simpan fisik file ke storage/public/produk
                $file->storeAs('produk', $namaFile, 'public');

                // simpan record ke database
                GambarProduk::create([
                    'products_id' => $produk->id,
                    'nama_gambar' => $namaFile,
                ]);
            }
        }

        return redirect()->route('member.produk.index', $toko->id)
                         ->with('success', 'Produk berhasil ditambahkan!');
    }





    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Product::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success','Produk berhasil dihapus!');
    }


    public function product(){
        $data['produk']=Product::all();
    return view('admin.produk.produk',$data);
    }
}
