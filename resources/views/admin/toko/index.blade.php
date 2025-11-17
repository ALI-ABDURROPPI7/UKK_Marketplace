<h2>Daftar Toko</h2>

<a href="{{ route('toko.create') }}">Tambah Toko</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nama Toko</th>
        <th>Pemilik</th>
    </tr>

    @foreach ($toko as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->nama_toko }}</td>
            <td>{{ $t->user->name }}</td>
        </tr>
    @endforeach
</table>
