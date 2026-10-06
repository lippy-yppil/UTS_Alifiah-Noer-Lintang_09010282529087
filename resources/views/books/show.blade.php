@extends('layouts.app')
@section('title', 'Detail buku')

@section('content')
<article class="detail">
    <p class="back"><a href="{{ route('books.index') }}">Kembali ke daftar buku</a></p>

    <h1>{{ $book->title }}</h1>
    <p class="byline">oleh {{ $book->author }}</p>

    <dl class="facts">
        <div><dt>Penerbit</dt><dd>{{ $book->publisher }}</dd></div>
        <div><dt>Tahun terbit</dt><dd>{{ $book->year }}</dd></div>
        <div>
            <dt>Kategori</dt>
            <dd><span class="tag spine-{{ $book->category_id % 5 }}">{{ $book->category->name }}</span></dd>
        </div>
        <div>
            <dt>Stok</dt>
            <dd>{{ $book->stock > 0 ? $book->stock . ' eksemplar tersedia' : 'Stok habis' }}</dd>
        </div>
        <div><dt>Dicatat</dt><dd>{{ $book->created_at->format('d M Y, H:i') }}</dd></div>
        <div><dt>Diperbarui</dt><dd>{{ $book->updated_at->format('d M Y, H:i') }}</dd></div>
    </dl>

    <div class="form-actions">
        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">Edit buku</a>
    </div>
</article>
@endsection