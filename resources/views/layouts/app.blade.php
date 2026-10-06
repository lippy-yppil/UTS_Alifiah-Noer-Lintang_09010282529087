<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Perpustakaan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
@auth
    <nav class="navbar navbar-expand navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">📚 Perpustakaan</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="nav-link" href="{{ route('books.index') }}">Daftar Buku</a>
            </div>
            <span class="navbar-text me-3">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-light">Logout</button>
            </form>
        </div>
    </nav>
@endauth

<div class="container pb-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>
</body>
</html>