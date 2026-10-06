@extends('layouts.app')
@section('title', 'Masuk')

@section('content')
<div class="auth-wrap">
    <div class="panel auth-panel">
        <span class="brand brand-static">Perpustakaan</span>
        <h1>Masuk</h1>
        <p class="lead">Gunakan akun pengelola untuk membuka katalog buku.</p>

        <form method="POST" action="{{ route('login.process') }}" class="stack">
            @csrf

            <div class="field">
                <label class="label" for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="input @error('email') is-invalid @enderror" autofocus>
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label class="label" for="password">Kata sandi</label>
                <input id="password" type="password" name="password"
                       class="input @error('password') is-invalid @enderror">
                @error('password') <p class="error">{{ $message }}</p> @enderror
            </div>

            <label class="check">
                <input type="checkbox" name="remember"> Ingat saya di perangkat ini
            </label>

            <button class="btn btn-primary">Masuk</button>
        </form>

        <p class="hint">Akun contoh: admin@perpus.test, kata sandi: password</p>
    </div>
</div>
@endsection