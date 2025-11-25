@extends('admin.sidebar')

@section('title','Daftar Member')

@section('content')

<div style="
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
">

    <h2 style="margin-bottom:20px;">Daftar User</h2>

    <a href="{{ route('admin.user.create') }}" style="
        background:#1e40af;
        color:white;
        padding:8px 14px;
        border-radius:6px;
        text-decoration:none;
        font-weight:bold;
    ">
        + Tambah User
    </a>

    <table width="100%" border="1" cellpadding="8" style="margin-top:20px; border-collapse: collapse;">
        <tr style="background:#f1f5ff;">
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>

        @foreach($users as $u)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->email }}</td>
            <td style="text-transform:capitalize;">
                {{ $u->role }}
            </td>
            <td>

                {{-- TOMBOL EDIT --}}
                <a href="{{ route('admin.user.edit', $u->id) }}"
                    style="
                        background:#1e88e5;
                        color:white;
                        padding:6px 10px;
                        border-radius:5px;
                        text-decoration:none;
                        margin-right:3px;
                    ">
                    Edit
                </a>

                {{-- HAPUS --}}
                <form action="{{ route('admin.user.delete',$u->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus user ini?')" style="
                        background:#d32f2f;
                        color:white;
                        border:none;
                        padding:6px 10px;
                        border-radius:5px;
                    ">Hapus</button>
                </form>

            </td>
        </tr>
        @endforeach

    </table>

</div>

@endsection
