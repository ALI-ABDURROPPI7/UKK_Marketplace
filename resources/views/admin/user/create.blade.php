@extends('admin.sidebar')

@section('title','Tambah User')

@section('content')

<div style="
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
">

    <h2 style="margin-bottom:20px;">Tambah User Baru</h2>

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf

        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required
        style="width:100%;padding:8px;margin-bottom:10px;border-radius:6px;border:1px solid #bbb">

        <label>Username</label>
        <input type="text" name="username" class="form-control" required
        style="width:100%;padding:8px;margin-bottom:10px;border-radius:6px;border:1px solid #bbb">

        <label>Email</label>
        <input type="email" name="email" class="form-control" required
        style="width:100%;padding:8px;margin-bottom:10px;border-radius:6px;border:1px solid #bbb">

        <label>Password</label>
        <input type="password" name="password" class="form-control" required
        style="width:100%;padding:8px;margin-bottom:10px;border-radius:6px;border:1px solid #bbb">

        <label>Role</label>
        <select name="role" class="form-control" required
        style="width:100%;padding:8px;margin-bottom:15px;border-radius:6px;border:1px solid #bbb">
            <option value="admin">Admin</option>
            <option value="member">Member</option>
        </select>

        <button type="submit" style="
            background:#1e40af;
            color:white;
            padding:10px 20px;
            border:none;
            border-radius:6px;
            font-weight:bold;
        ">
            Simpan User
        </button>

    </form>

</div>

@endsection
