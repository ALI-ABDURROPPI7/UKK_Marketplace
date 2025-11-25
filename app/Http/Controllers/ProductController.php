<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Product;
use App\Models\Toko;
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('gambar')?->store('produk', 'public');

        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'foto' => $path,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
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
    public function destroy(Product $product)
    {
        //
       Product::where('id', $product)->delete();
        return redirect()->route('admin.produk.index')->with('success','Produk berhasil dihapus!');
    }
    public function product(){
        $data['produk']=Product::all();
    return view('admin.produk.produk',$data);
    }
}
