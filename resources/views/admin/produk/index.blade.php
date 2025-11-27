@extends('admin.sidebar')


@section('content')

<h3>Data Produk Member</h3>

<table border="1" width="100%">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

    @foreach($produks as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->harga }}</td>
        <td>
            @if($p->foto)
                    <img src="{{ asset('storage/'.$p->foto) }}"
                         width="60" height="60"
                         style="object-fit:cover; border-radius:8px;">
                @else
                    <span style="color:#777;">No Image</span>
                @endif
        </td>

        <td>
            <form action="{{ route('admin.produk.delete',$p->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus?')"
                                style="padding:6px 10px; background:#e53935; color:white; border:none; border-radius:4px;">
                            Hapus
                        </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
