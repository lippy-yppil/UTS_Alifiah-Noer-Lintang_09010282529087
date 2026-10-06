@extends('layouts.app')
@section('title', 'Tambah Buku')

@section('content')
<h3 class="mb-3">Tambah Buku</h3>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ route('books.store') }}">
        @include('books._form')
    </form>
</div></div>
@endsection