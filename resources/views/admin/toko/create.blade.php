@extends('layout')

@section('content')

<!-- CUSTOM STYLE -->
<style>
    .card-form {
        max-width: 650px;
        margin: 0 auto;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        background: #ffffff;
    }
    .card-form h2 {
        font-weight: 600;
        color: #1e88e5;
        margin-bottom: 20px;
    }
    .btn-primary {
        background-color: #1e88e5 !important;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
    }
    .btn-primary:hover {
        background-color: #166fbd !important;
    }
</style>

<div class="container mt-4">
    <div class="card-form">
        <h2>Tambah Toko</h2>

        <form action="{{ route('toko.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Toko</label>
                <input type="text" class="form-control" name="nama_toko" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kontak (WA/Telepon)</label>
                <input type="text" class="form-control" name="kontak" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Toko</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Simpan
            </button>
        </form>
    </div>
</div>

@endsection
