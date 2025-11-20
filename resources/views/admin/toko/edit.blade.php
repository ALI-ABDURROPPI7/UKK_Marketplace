@extends('layout')

@section('content')
<h2>Edit Toko</h2>

<form action="{{ route('toko.update', $toko->id) }}"
      method="POST"
      enctype="multipart/form-data"
      style="max-width:500px; margin-top:20px;">

    @csrf
    @method('PUT')

    <label>Nama Toko</label>
    <input type="text" name="nama_toko" value="{{ $toko->nama_toko }}" class="form-control" required>

    <label>Alamat</label>
    <input type="text" name="alamat" value="{{ $toko->alamat }}" class="form-control" required>

    <label>Kontak</label>
    <input type="text" name="kontak" value="{{ $toko->kontak }}" class="form-control" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required>{{ $toko->deskripsi }}</textarea>

    <label>Foto Toko</label><br>
    @if($toko->foto)
        <img src="{{ asset('foto_toko/' . $toko->foto) }}" width="80" style="margin-bottom:10px;">
    @endif
    <input type="file" name="foto" class="form-control">

    <button type="submit"
            style="margin-top:15px; padding:8px 14px; background:#1e88e5; color:white; border:none; border-radius:6px;">
        Simpan Perubahan
    </button>

</form>
@endsection
