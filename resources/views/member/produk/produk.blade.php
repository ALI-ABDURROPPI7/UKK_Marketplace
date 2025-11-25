@extends('member.dashboard')

@section('title', 'Produk Saya')

@section('content')

<h2>Produk Toko: <strong>{{ $toko->nama_toko ?? 'Nama Toko Tidak Ada' }}</strong></h2>
<hr>

<a href="{{ route('member.produk.create', $toko->id) }}"
   style="
        padding: 10px 18px;
        background:#1e88e5;
        color:white;
        border-radius:6px;
        text-decoration:none;
        font-weight:bold;">
    + Tambah Produk
</a>

<br><br>

<table border="1" width="100%" cellpadding="10" cellspacing="0">
    <thead>
        <tr style="background:#f2f2f2;">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
@forelse($produk as $p)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $p->nama }}</td>
    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
    <td>{{ $p->kategori->nama ?? '-' }}</td>

    <td>
        @if($p->foto)
            <img src="{{ asset('storage/' . $p->foto) }}"
                 width="70"
                 style="border-radius:6px;object-fit:cover;">
        @else
            <span style="color:#888;">No Image</span>
        @endif
    </td>

    <td>
        <a href="{{ route('member.produk.edit', [$toko->id, $p->id]) }}"
           style="padding:6px 10px;background:#ffa726;color:white;border-radius:4px;text-decoration:none;">
            Edit
        </a>

        <form action="{{ route('member.produk.destroy', [$toko->id, $p->id]) }}"
              method="POST"
              style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Yakin ingin menghapus?')"
                    style="padding:6px 10px;background:#e53935;color:white;border:none;border-radius:4px;">
                Hapus
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" style="text-align:center;">Belum ada produk.</td>
</tr>
@endforelse
</tbody>

</table>

@endsection
