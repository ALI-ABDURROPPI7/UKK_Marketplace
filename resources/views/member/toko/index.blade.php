@extends('layouts.member')

@section('title', 'Daftar Toko')

@section('content')
<h2 style="margin-bottom:20px;">Daftar Toko</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr style="background:#1e88e5; color:white;">
        <th>Nama Toko</th>
        <th>Dibuat Pada</th>
    </tr>

    @foreach($toko as $t)
        <tr>
            <td>{{ $t->nama }}</td>
            <td>{{ $t->created_at->format('d M Y') }}</td>
        </tr>
    @endforeach
</table>
@endsection
