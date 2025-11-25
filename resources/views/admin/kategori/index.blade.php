@extends('admin.sidebar')

@section('title', 'Data Kategori')

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

    .btn-add:hover {
        background:#16318f;
    }

    table {
        width:100%;
        border-collapse: collapse;
        margin-top:20px;
    }

    table th {
        background:#f1f5ff;
        padding:10px;
        border:1px solid #cbd5e1;
        font-weight:700;
        color:#1e40af;
    }

    table td {
        padding:10px;
        border:1px solid #cbd5e1;
    }

    .btn-edit{
        background:#f59e0b;
        padding:7px 12px;
        border-radius:6px;
        color:white;
        text-decoration:none;
        font-size:14px;
        font-weight:600;
    }

    .btn-edit:hover{
        background:#d98206;
    }

    .btn-delete{
        background:#dc2626;
        padding:7px 12px;
        border-radius:6px;
        border:none;
        color:white;
        font-size:14px;
        cursor:pointer;
        font-weight:600;
    }

    .btn-delete:hover{
        background:#b91c1c;
    }

</style>



<h2 style="margin-bottom:18px; font-weight:700; color:#1e40af;">Data Kategori</h2>

<a href="{{ route('kategori.create') }}" class="btn-add">
    + Tambah Kategori
</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th style="width:150px;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($kategori as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->nama }}</td>
                <td>

                    <a href="{{ route('kategori.edit', $k->id) }}" class="btn-edit">Edit</a>

                    <form action="{{ route('kategori.destroy', $k->id) }}" method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus kategori?')" class="btn-delete">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
