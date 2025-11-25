@extends('member.dashboard')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Daftar Toko</h3>

    @if($tokos->count() == 0)
        <p class="text-muted">Belum ada toko yang ditambahkan admin.</p>
    @endif

    <div class="row">
        @foreach($tokos as $t)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    @if($t->foto)
                        <img src="{{ asset('storage/'.$t->foto) }}" class="card-img-top" height="180" style="object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $t->nama }}</h5>
                        <p class="card-text text-muted">{{ $t->alamat }}</p>

                        <a href="#" class="btn btn-primary btn-sm">Lihat Produk</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr class="my-4">

    <h3 class="mb-3">Produk Saya</h3>

    @if($produks->count() == 0)
        <p class="text-muted">Belum ada produk yang kamu buat.</p>
    @endif

    <div class="row">
        @foreach($produks as $p)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    @if($p->foto)
                        <img src="{{ asset('storage/'.$p->foto) }}" class="card-img-top" height="180" style="object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $p->nama }}</h5>
                        <p class="text-muted mb-1">Harga: Rp{{ number_format($p->harga) }}</p>

                        <p class="mb-0">
                            <strong>Toko:</strong>
                            {{ $p->toko->nama ?? 'Tidak memiliki toko' }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
