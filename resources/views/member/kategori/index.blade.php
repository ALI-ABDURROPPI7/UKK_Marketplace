@extends('member.dashboard')

@section('title', 'Kategori')

@section('content')

<h2>Daftar Kategori</h2>
<hr>

<table border="1" width="100%" cellpadding="10">
    <thead>
        <tr style="background:#f2f2f2;">
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>

    <tbody>
        @foreach($kategori as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
