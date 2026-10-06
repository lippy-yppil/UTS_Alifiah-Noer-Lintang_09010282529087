@csrf

<div class="form-grid">
    <div class="field col-6">
        <label class="label" for="title">Judul</label>
        <input id="title" type="text" name="title" value="{{ old('title', $book->title ?? '') }}"
               class="input @error('title') is-invalid @enderror">
        @error('title') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div class="field col-3">
        <label class="label" for="author">Penulis</label>
        <input id="author" type="text" name="author" value="{{ old('author', $book->author ?? '') }}"
               class="input @error('author') is-invalid @enderror">
        @error('author') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div class="field col-3">
        <label class="label" for="publisher">Penerbit</label>
        <input id="publisher" type="text" name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}"
               class="input @error('publisher') is-invalid @enderror">
        @error('publisher') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div class="field col-2">
        <label class="label" for="year">Tahun terbit</label>
        <input id="year" type="number" name="year" value="{{ old('year', $book->year ?? '') }}"
               class="input @error('year') is-invalid @enderror">
        @error('year') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div class="field col-2">
        <label class="label" for="stock">Stok</label>
        <input id="stock" type="number" name="stock" value="{{ old('stock', $book->stock ?? 0) }}"
               class="input @error('stock') is-invalid @enderror">
        @error('stock') <p class="error">{{ $message }}</p> @enderror
    </div>

    <div class="field col-2">
        <label class="label" for="category_id">Kategori</label>
        <select id="category_id" name="category_id" class="select @error('category_id') is-invalid @enderror">
            <option value="">Pilih kategori</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @selected(old('category_id', $book->category_id ?? '') == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <p class="error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="form-actions">
    <button class="btn btn-primary">{{ $submit ?? 'Simpan' }}</button>
    <a href="{{ route('books.index') }}" class="btn btn-ghost">Batal</a>
</div>