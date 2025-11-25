@extends('member.dashboard')

@section('content')

<h2 style="font-size:26px;font-weight:700;margin-bottom:25px;">
    Dashboard Member
</h2>

{{-- STATISTICS --}}
<div style="
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:20px;
    margin-bottom:30px;
">

    <div style="background:white;padding:25px;border-radius:12px;box-shadow:0 5px 12px rgba(0,0,0,0.08);">
        <h4 style="margin:0;font-size:18px;color:#374151;">Status Toko</h4>
        <p style="font-size:22px;margin-top:10px;font-weight:700;color:#1e3a8a;">
            {{ $toko ? 'Aktif' : 'Belum Ada' }}
        </p>
    </div>

    <div style="background:white;padding:25px;border-radius:12px;box-shadow:0 5px 12px rgba(0,0,0,0.08);">
        <h4 style="margin:0;font-size:18px;color:#374151;">Total Produk</h4>
        <p style="font-size:22px;margin-top:10px;font-weight:700;color:#1e3a8a;">
            {{ $totalProduk }}
        </p>
    </div>

</div>

{{-- TERBARU --}}
<h3 style="font-weight:700;margin-bottom:12px;">Produk Terbaru</h3>

@if(count($produkTerbaru) == 0)

    <p style="opacity:0.5;">Belum ada produk</p>

@else

<table border="1" width="100%" cellpadding="10">
    <tr style="background:#eef3ff;">
        <th>Nama</th>
        <th>Harga</th>
        <th>Tanggal</th>
    </tr>

    @foreach($produkTerbaru as $p)
    <tr>
        <td>{{ $p->nama }}</td>
        <td>Rp {{ number_format($p->harga,0,',','.') }}</td>
        <td>{{ $p->created_at->format('d-m-Y') }}</td>
    </tr>
    @endforeach
</table>

@endif

@endsection
