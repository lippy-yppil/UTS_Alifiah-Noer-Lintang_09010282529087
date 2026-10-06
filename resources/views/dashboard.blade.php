@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<header class="page-head">
    <div>
        <h1>Selamat datang, {{ auth()->user()->name }}</h1>
        <p class="lead">Ringkasan koleksi perpustakaan hari ini.</p>
    </div>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah buku</a>
</header>

<p class="summary">
    Koleksi terdiri dari <strong>{{ $totalBooks }}</strong> judul dalam
    <strong>{{ $totalCategories }}</strong> kategori, dengan
    <strong>{{ $totalStock }}</strong> eksemplar di rak.
</p>

<section class="shelf-section" aria-labelledby="shelf-title">
    <h2 id="shelf-title">Baru di rak</h2>

    @if ($latestBooks->isEmpty())
        <p class="empty">
            Belum ada buku. <a href="{{ route('books.create') }}">Tambahkan buku pertama</a>.
        </p>
    @else
        <div class="shelf">
            @foreach ($latestBooks as $book)
                <a href="{{ route('books.show', $book) }}"
                @class(['spine', 'spine-' . ($book->category_id % 5)])
                @style([
                    'height: ' . (150 + ($book->id * 23) % 60) . 'px',
                    'width: ' . (48 + ($book->id * 11) % 18) . 'px',
                ])
                title="{{ $book->title }}, {{ $book->author }}">
                    <span>{{ $book->title }}</span>
                </a>
            @endforeach
        </div>
    @endif
</section>
@endsection