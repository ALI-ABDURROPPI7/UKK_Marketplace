@extends('member.dashboard')

@section('title', 'Tambah Produk')

@section('content')

<h2>Tambah Produk untuk Toko: <strong>{{ $toko->nama_toko }}</strong></h2>
<hr>

{{-- Tampilkan error validasi --}}
@if ($errors->any())
    <div style="background:#ffcccc; padding:10px; border-left:5px solid red; margin-bottom:15px;">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('member.produk.str', $toko->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="toko_id" value="{{ $toko->id }}">

    {{-- NAMA PRODUK --}}
    <label>Nama Produk</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}" required
           style="width:100%; padding:10px; margin-bottom:5px;">
    @error('nama')
        <div style="color:red; margin-bottom:15px;">{{ $message }}</div>
    @enderror

    {{-- HARGA --}}
    <label>Harga Produk</label><br>
    <input type="number" name="harga" value="{{ old('harga') }}" required
           style="width:100%; padding:10px; margin-bottom:5px;">
    @error('harga')
        <div style="color:red; margin-bottom:15px;">{{ $message }}</div>
    @enderror

    {{-- KATEGORI --}}
    <label>Kategori</label><br>
    <select name="kategori_id" required
            style="width:100%; padding:10px; margin-bottom:5px;">
        <option value="">Pilih Kategori</option>
        @foreach ($kategori as $k)
            <option value="{{ $k->id }}"
                {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>
    @error('kategori_id')
        <div style="color:red; margin-bottom:15px;">{{ $message }}</div>
    @enderror

    {{-- FOTO PRODUK --}}
    <label>Foto Produk</label><br>
<input type="file" name="gambar[]" multiple>

    @error('foto')
        <div style="color:red; margin-bottom:15px;">{{ $message }}</div>
    @enderror

    <button type="submit"
            style="padding:10px 18px; background:#1e88e5; color:white; border:none; border-radius:6px;">
        Simpan Produk
    </button>

</form>

@endsection
