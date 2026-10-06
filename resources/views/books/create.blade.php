@extends('layouts.app')
@section('title', 'Tambah buku')

@section('content')
<header class="page-head">
    <div>
        <h1>Tambah buku</h1>
        <p class="lead">Catat buku baru ke dalam katalog.</p>
    </div>
</header>

<div class="panel">
    <form method="POST" action="{{ route('books.store') }}">
        @include('books._form', ['submit' => 'Simpan buku'])
    </form>
</div>
@endsection