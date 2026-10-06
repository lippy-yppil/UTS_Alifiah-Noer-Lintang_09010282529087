@extends('layouts.app')
@section('title', 'Edit Buku')

@section('content')
<h3 class="mb-3">Edit Buku</h3>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ route('books.update', $book) }}">
        @method('PUT')
        @include('books._form')
    </form>
</div></div>
@endsection