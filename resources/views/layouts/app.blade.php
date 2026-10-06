<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Katalog') - Perpustakaan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/perpus.css') }}">
</head>
<body>
@auth
    <header class="site-header">
        <div class="inner">
            <a class="brand" href="{{ route('dashboard') }}">Perpustakaan</a>

            <nav class="nav" aria-label="Menu utama">
                <a href="{{ route('dashboard') }}" @class(['nav-link', 'is-active' => request()->routeIs('dashboard')])>Dashboard</a>
                <a href="{{ route('books.index') }}" @class(['nav-link', 'is-active' => request()->routeIs('books.*')])>Daftar buku</a>
            </nav>

            <div class="account">
                <span>{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="btn btn-ghost btn-sm">Keluar</button>
                </form>
            </div>
        </div>
    </header>
@endauth

<main class="page">
    @if (session('success'))
        <div class="flash" role="status">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

<footer class="site-footer">Sistem pengelolaan buku, UTS Pemrograman Web III</footer>
</body>
</html>