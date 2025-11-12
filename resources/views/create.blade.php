<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Daftar Produk</h2>
    <a href="{{ route('produk.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded">Tambah Produk</a>

    @foreach($produks as $p)
        <div class="border p-3 my-3 rounded">
            <h3 class="font-semibold">{{ $p->nama }}</h3>
            <p>{{ $p->deskripsi }}</p>
            <p>Harga: Rp{{ number_format($p->harga) }}</p>
            @if($p->gambar)
                <img src="{{ asset('storage/'.$p->gambar) }}" width="150">
            @endif
            <form action="{{ route('produk.destroy', $p->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-2 py-1 rounded mt-2">Hapus</button>
            </form>
        </div>
    @endforeach
</x-app-layout>
