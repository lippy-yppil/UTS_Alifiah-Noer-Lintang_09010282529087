@extends('layouts.app')
@section('title', 'Daftar buku')

@section('content')
<header class="page-head">
    <div>
        <h1>Daftar buku</h1>
        <p class="lead">{{ $books->total() }} judul tercatat di katalog.</p>
    </div>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah buku</a>
</header>

{{-- Bonus: pencarian & filter kategori --}}
<form method="GET" class="filter">
    <input type="search" name="q" value="{{ request('q') }}" class="input"
           placeholder="Cari judul atau penulis" aria-label="Cari judul atau penulis">

    <select name="category" class="select" aria-label="Filter kategori">
        <option value="">Semua kategori</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" @selected(request('category') == $cat->id)>{{ $cat->name }}</option>
        @endforeach
    </select>

    <button class="btn btn-ghost">Cari</button>

    @if (request()->hasAny(['q', 'category']))
        <a href="{{ route('books.index') }}" class="btn btn-ghost">Reset</a>
    @endif
</form>

<div class="table-wrap">
    <table class="ledger">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th class="num">Tahun</th>
                <th class="num">Stok</th>
                <th>Kategori</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse ($books as $book)
            <tr>
                <td>{{ $books->firstItem() + $loop->index }}</td>
                <td class="book-title">{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td class="num">{{ $book->year }}</td>
                <td class="num">{{ $book->stock }}</td>
                <td><span class="tag spine-{{ $book->category_id % 5 }}">{{ $book->category->name }}</span></td>
                <td>
                    <div class="actions">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-ghost btn-sm">Detail</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-ghost btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline"
                              onsubmit="return confirm('Hapus buku ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="empty">Tidak ada buku yang cocok. Ubah kata kunci atau tekan Reset.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

{{ $books->links('vendor.pagination.perpus') }}
@endsection