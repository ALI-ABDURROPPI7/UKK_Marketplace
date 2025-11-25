@extends('admin.sidebar')

@section('title','Edit Toko')

@section('content')

<style>

    .card-box {
        max-width: 650px;
        margin: 0 auto;
        margin-top: 20px;
        background:white;
        border-radius:12px;
        padding:25px;
        box-shadow:0 4px 12px rgba(0,0,0,0.1);
    }

    .card-box h2 {
        margin-bottom:20px;
        font-weight:700;
        color:#1e40af;
        font-size:24px;
        text-align:center;
    }

    .form-control {
        width:100%;
        padding:10px;
        border:1px solid #cbd5e1;
        border-radius:6px;
        margin-bottom:12px;
    }

    label {
        font-weight:600;
        color:#475569;
    }

    .btn-submit {
        margin-top:15px;
        width:100%;
        background:#1e40af;
        border:none;
        padding:11px;
        border-radius:8px;
        color:white;
        font-weight:700;
        font-size:16px;
        cursor:pointer;
        transition: .2s;
    }

    .btn-submit:hover {
        background:#16318f;
    }

</style>


<div class="card-box">

    <h2>Edit Toko</h2>

    <form action="{{ route('toko.update', $toko->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Toko</label>
        <input type="text" name="nama_toko" value="{{ $toko->nama_toko }}" class="form-control" required>

        <label>Alamat</label>
        <input type="text" name="alamat" value="{{ $toko->alamat }}" class="form-control" required>

        <label>Kontak</label>
        <input type="text" name="kontak" value="{{ $toko->kontak }}" class="form-control" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="4" class="form-control" required>{{ $toko->deskripsi }}</textarea>

        <label>Pemilik Toko</label>
        <select name="user_id" class="form-control" required>
            <option value="">-- Pilih Pemilik --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $toko->user_id==$user->id?'selected':'' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <label>Foto Toko</label><br>

        @if($toko->foto)
            <img src="{{ asset('foto_toko/'.$toko->foto) }}" width="110" style="margin-bottom:12px; border-radius:6px;">
        @endif

        <input type="file" name="foto" class="form-control">

        <button type="submit" class="btn-submit">Simpan Perubahan</button>

    </form>

</div>

@endsection
