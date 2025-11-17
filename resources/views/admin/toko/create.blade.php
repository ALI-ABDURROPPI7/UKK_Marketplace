<h2>Tambah Toko</h2>

<form method="POST" action="{{ route('toko.store') }}">
    @csrf

    <input type="text" name="nama_toko" placeholder="Nama toko">

    <select name="user_id">
        <option>Pilih Pemilik</option>
        @foreach ($users as $u)
            <option value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>
