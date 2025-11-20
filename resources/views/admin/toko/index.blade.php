@extends('layout')

@section('content')

<h2 style="margin-bottom: 20px;">Daftar Toko</h2>

<a href="{{ route('toko.create') }}"
   style="padding: 10px 15px; background:#1e88e5; color:white; border-radius:6px; text-decoration:none;">
    + Tambah Toko
</a>

@if (session('success'))
    <div style="
        padding:12px 18px;
        background:#D4EDDA;
        color:#155724;
        border:1px solid #C3E6CB;
        border-radius:6px;
        font-weight:600;
        margin-bottom:25px;   /* <— JARAK DIBUAT LEBIH BESAR */
        margin-top:20px;      /* <— JARAK DARI ATAS BISA TAMBAH JUGA */
    ">
        ✔ {{ session('success') }}
    </div>
@endif

<table style="width:100%; margin-top:20px; border-collapse:collapse;">
    <thead>
        <tr style="background:#f0f4f9; border-bottom:2px solid #dbe3eb;">
            <th style="padding:14px; text-align:center; font-weight:600;">ID</th>
            <th style="padding:14px; text-align:left; font-weight:600;">Nama Toko</th>
            <th style="padding:14px; text-align:center; font-weight:600;">Logo Toko</th>
            <th style="padding:14px; text-align:left; font-weight:600;">Alamat</th>
            <th style="padding:14px; text-align:center; font-weight:600;">Kontak</th>
            <th style="padding:14px; text-align:center; font-weight:600;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($toko as $item)
        <tr style="border-bottom:1px solid #eee;">
            <td style="padding:14px; text-align:center;">{{ $item->id }}</td>

            <td style="padding:14px; text-align:left;">
                {{ $item->nama_toko }}
            </td>

            <td style="padding:14px; text-align:center;">
                @if($item->foto)
                    <img src="{{ asset('foto_toko/' . $item->foto) }}"
                         alt="Logo Toko"
                         style="width:55px; height:55px; border-radius:8px; object-fit:cover;">
                @else
                    <span style="color:#888;">No Image</span>
                @endif
            </td>

            <td style="padding:14px; text-align:left;">{{ $item->alamat }}</td>

            <td style="padding:14px; text-align:center;">{{ $item->kontak }}</td>

            <td style="padding:14px; text-align:center;">

                <!-- Tombol Edit -->
                <a href="{{ route('toko.edit', $item->id) }}"
                   style="
                        padding:8px 18px;
                        background:#FFC107;
                        color:#fff;
                        border-radius:6px;
                        text-decoration:none;
                        font-weight:600;
                        font-size:14px;
                        margin-right:6px;
                        display:inline-block;
                        transition:0.2s;
                   "
                   onmouseover="this.style.background='#e0a800'"
                   onmouseout="this.style.background='#FFC107'">
                    Edit
                </a>

                <!-- Tombol Hapus -->
                <form action="{{ route('toko.destroy', $item->id) }}"
                      method="POST"
                      style="display:inline-block;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus toko ini?')"
                            style="
                                padding:8px 18px;
                                background:#E53935;
                                color:white;
                                border:none;
                                border-radius:6px;
                                font-weight:600;
                                font-size:14px;
                                cursor:pointer;
                                transition:0.2s;
                            "
                            onmouseover="this.style.background='#c62828'"
                            onmouseout="this.style.background='#E53935'">
                        Hapus
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection
