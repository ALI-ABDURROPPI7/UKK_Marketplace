@extends('member.dashboard')

@section('title', 'Edit Produk')

@section('content')

<h2>Edit Produk untuk Toko: <strong>{{ $toko->nama_toko }}</strong></h2>
<hr>

<form action="{{ route('member.produk.update', [$toko->id, $produk->id]) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <input type="hidden" name="toko_id" value="{{ $toko->id }}">

    <label>Nama Produk</label>
    <input type="text" name="nama" value="{{ $produk->nama }}" required
           style="width:100%; padding:10px; margin-bottom:15px;">

    <label>Harga Produk</label>
    <input type="number" name="harga" value="{{ $produk->harga }}" required
           style="width:100%; padding:10px; margin-bottom:15px;">

    <label>Kategori</label>
    <select name="kategori_id" required
            style="width:100%; padding:10px; margin-bottom:15px;">
        @foreach ($kategori as $k)
            <option value="{{ $k->id }}"
                {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>

    <br>

    <label>Gambar Produk Sekarang</label> <br><br>

    @if($produk->gambar)
        <img src="{{ asset('storage/'.$produk->gambar) }}"
             width="140"
             style="border-radius:8px; margin-bottom:15px;">
    @else
        <p style="color:#888">Tidak ada gambar.</p>
    @endif

    <br><br>

    <label>Ganti Gambar Baru</label>
    <input type="file" name="gambar"
           style="width:100%; padding:10px; margin-bottom:20px;">

    <button type="submit"
            style="padding:10px 18px; background:#1e88e5; color:white; border:none; border-radius:6px; font-weight:bold;">
        Update Produk
    </button>

</form>

@endsection
