<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
    {
        $categories = Kategori::get();
        $products = Product::latest()->get();


        return view('home', compact('categories','products'));
    }

    public function byKategori($id)
    {
        $categories = Kategori::get();
        $products = Product::where('kategori_id', $id)->latest()->get();

        return view('home_kategori', compact('products','categories'));
    }

    public function detail($id)
    {
        $produk = Product::with('toko')->findOrFail($id);

        return view('detail', compact('produk'));
    }
}

