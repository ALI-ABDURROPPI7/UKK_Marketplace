@extends('admin.sidebar')

@section('title','Daftar Toko')

@section('content')

<style>

    .btn-add {
        background:#1e40af;
        color:white;
        padding:8px 14px;
        border-radius:8px;
        text-decoration:none;
        font-weight:600;
    }

    .btn-add:hover{
        background:#16318f;
    }

    table {
        width:100%;
        margin-top:20px;
        border-collapse: collapse;
    }

    table tr th {
        background:#f1f5ff;
        padding:12px;
        border:1px solid #d1d5db;
        font-weight:700;
        color:#1e40af;
        text-align:center;
    }

    table td {
        padding:12px;
        border:1px solid #d1d5db;
    }

    .btn-edit{
        background:#f59e0b;
        padding:8px 12px;
        border-radius:6px;
        color:white;
        text-decoration:none;
        font-size:14px;
        font-weight:600;
        margin-right:4px;
    }

    .btn-edit:hover{
        background:#d98206;
    }

    .btn-delete{
        background:#dc2626;
        padding:8px 12px;
        border-radius:6px;
        border:none;
        color:white;
        font-size:14px;
        font-weight:600;
        cursor:pointer;
    }

    .btn-delete:hover{
        background:#b91c1c;
    }

</style>


<h2 style="font-weight:700; color:#1e40af; margin-bottom:18px;">Daftar Toko</h2>

<a href="{{ route('toko.create') }}" class="btn-add">
    + Tambah Toko
</a>


<table>
    <thead>
        <tr>
            <th width="50">ID</th>
            <th>Nama</th>
            <th width="120">Logo</th>
            <th>Alamat</th>
            <th width="120">Kontak</th>
            <th width="160">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($toko as $item)
        <tr>
            <td align="center">{{ $item->id }}</td>

            <td>{{ $item->nama_toko }}</td>

            <td align="center">
                @if($item->foto)
                    <img src="{{ asset('foto_toko/'.$item->foto) }}"
                         width="60" height="60"
                         style="object-fit:cover; border-radius:8px;">
                @else
                    <span style="color:#777;">No Image</span>
                @endif
            </td>

            <td>{{ $item->alamat }}</td>

            <td align="center">{{ $item->kontak }}</td>

            <td align="center">

                <a href="{{ route('toko.edit', $item->id) }}" class="btn-edit">
                    Edit
                </a>

                <form action="{{ route('toko.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus toko ini?')"
                            class="btn-delete">
                        Hapus
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
