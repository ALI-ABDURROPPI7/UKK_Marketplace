<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Toko;
use App\Models\Product;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUser     = User::count();
        $totalToko     = Toko::count();
        $totalProduk   = Product::count();
        $totalKategori = Kategori::count();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalToko',
            'totalProduk',
            'totalKategori'
        ));
    }
}
