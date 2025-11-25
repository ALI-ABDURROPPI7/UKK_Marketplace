@extends('admin.sidebar')

@section('title','Edit User')

@section('content')

<div style="
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
">

    <h2 style="margin-bottom:20px;">Edit User</h2>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control"
               value="{{ $user->name }}"
        style="width:100%;padding:8px;margin-bottom:10px;border-radius:6px;border:1px solid #bbb" required>

        <label>Username</label>
        <input type="text" name="username" class="form-control"
               value="{{ $user->username }}"
        style="width:100%;padding:8px;margin-bottom:10px;border-radius:6px;border:1px solid #bbb" required>

        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ $user->email }}"
        style="width:100%;padding:8px;margin-bottom:10px;border-radius:6px;border:1px solid #bbb" required>

        <label>Role</label>
        <select name="role" class="form-control" required
        style="width:100%;padding:8px;margin-bottom:15px;border-radius:6px;border:1px solid #bbb">
            <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
            <option value="member" {{ $user->role=='member'?'selected':'' }}>Member</option>
        </select>

        <button type="submit" style="
            background:#1e40af;
            color:white;
            padding:10px 20px;
            border:none;
            border-radius:6px;
            font-weight:bold;
        ">
            Update User
        </button>

    </form>

</div>

@endsection
