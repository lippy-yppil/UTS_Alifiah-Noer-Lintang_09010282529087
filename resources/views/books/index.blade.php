@extends('layouts.app')
@section('title', 'Daftar Buku')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Daftar Buku</h3>
    <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku</a>
</div>

{{-- Bonus: pencarian & filter kategori --}}
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-5">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control"
               placeholder="Cari judul atau penulis...">
    </div>
    <div class="col-md-4">
        <select name="category" class="form-select">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @selected(request('category') == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 d-flex gap-2">
        <button class="btn btn-secondary">Cari</button>
        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Reset</a>
    </div>
</form>

<div class="card">
    <table class="table table-striped mb-0 align-middle">
        <thead>
            <tr>
                <th>#</th><th>Judul</th><th>Penulis</th><th>Penerbit</th>
                <th>Tahun</th><th>Stok</th><th>Kategori</th><th class="text-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($books as $book)
            <tr>
                <td>{{ $books->firstItem() + $loop->index }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->stock }}</td>
                <td><span class="badge text-bg-info">{{ $book->category->name }}</span></td>
                <td class="text-end">
                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus buku ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="text-center text-muted py-4">Data buku tidak ditemukan.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $books->links('pagination::bootstrap-5') }}</div>
@endsection