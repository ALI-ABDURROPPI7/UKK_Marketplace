@extends('admin.sidebar')

@section('title', 'Edit Kategori')

@section('content')

<style>
    .card-box {
        background:white;
        border-radius:12px;
        padding:25px;
        box-shadow:0 4px 12px rgba(0,0,0,0.1);
        width:450px;
        margin:auto;
        margin-top:20px;
    }

    .card-box h2 {
        margin-bottom:18px;
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
        margin-top:5px;
        font-size:15px;
    }

    label {
        font-size:16px;
        font-weight:600;
        color:#475569;
    }

    .btn-submit {
        margin-top:18px;
        width:100%;
        background:#1e40af;
        border:none;
        padding:10px;
        border-radius:8px;
        font-size:16px;
        color:white;
        font-weight:600;
        cursor:pointer;
        transition:.25s;
    }

    .btn-submit:hover {
        background:#16318f;
    }

</style>


<div class="card-box">

    <h2>Edit Kategori</h2>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Kategori</label>
        <input type="text" name="nama" value="{{ $kategori->nama }}" class="form-control" required>

        <button type="submit" class="btn-submit">Update</button>
    </form>

</div>

@endsection
