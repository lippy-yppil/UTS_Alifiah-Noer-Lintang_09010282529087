@extends('layouts.app')
@section('title', 'Edit buku')

@section('content')
<header class="page-head">
    <div>
        <h1>Edit buku</h1>
        <p class="lead">{{ $book->title }}</p>
    </div>
</header>

<div class="panel">
    <form method="POST" action="{{ route('books.update', $book) }}">
        @method('PUT')
        @include('books._form', ['submit' => 'Simpan perubahan'])
    </form>
</div>
@endsection