<select name="toko_id" required>
    <option value="">Pilih Toko</option>
    @foreach ($toko as $t)
        <option value="{{ $t->id }}">{{ $t->nama }}</option>
    @endforeach
</select>
