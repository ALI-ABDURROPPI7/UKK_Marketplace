@extends('admin.sidebar')

@section('title','Tambah Toko')

@section('content')

<style>
    .card-form {
        max-width: 650px;
        margin: 0 auto;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.12);
        background: #ffffff;
    }

    .card-form h2 {
        font-weight: 700;
        color: #1e40af;
        font-size: 25px;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        margin-bottom: 12px;
    }

    .btn-primary {
        background-color: #1e40af !important;
        border: none;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: bold;
        font-size: 15px;
    }

    .btn-primary:hover {
        background-color: #16318f !important;
    }
</style>


<div class="card-form">

    <h2>Tambah Toko</h2>

    <form action="{{ route('toko.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Toko</label>
        <input type="text" class="form-control" name="nama_toko" required>

        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" required>

        <label>Kontak (WA/Telepon)</label>
        <input type="text" class="form-control" name="kontak" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>

        <label>Foto Toko</label>
        <input type="file" class="form-control" name="foto" accept="image/*">

        <label>Pemilik Toko</label>
        <select name="user_id" class="form-control" required>
            <option value="">-- Pilih Member --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary w-100" style="margin-top:15px;">
            Simpan
        </button>

    </form>

</div>

@endsection
