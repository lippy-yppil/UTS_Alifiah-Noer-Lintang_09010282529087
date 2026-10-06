@extends('layouts.app')
@section('title', 'Detail Buku')

@section('content')
<h3 class="mb-3">Detail Buku</h3>
<div class="card"><div class="card-body">
    <table class="table table-borderless mb-0">
        <tr><th style="width:180px">Judul</th><td>{{ $book->title }}</td></tr>
        <tr><th>Penulis</th><td>{{ $book->author }}</td></tr>
        <tr><th>Penerbit</th><td>{{ $book->publisher }}</td></tr>
        <tr><th>Tahun Terbit</th><td>{{ $book->year }}</td></tr>
        <tr><th>Stok</th><td>{{ $book->stock }}</td></tr>
        <tr><th>Kategori</th><td>{{ $book->category->name }}</td></tr>
        <tr><th>Dibuat</th><td>{{ $book->created_at->format('d M Y H:i') }}</td></tr>
        <tr><th>Diperbarui</th><td>{{ $book->updated_at->format('d M Y H:i') }}</td></tr>
    </table>
</div></div>
<a href="{{ route('books.index') }}" class="btn btn-outline-secondary mt-3">← Kembali</a>
@endsection