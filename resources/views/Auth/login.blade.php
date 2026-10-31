<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk | SI Praktikan</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body class="auth-page">
    <main class="auth-shell">
        <section class="auth-intro" aria-label="Informasi SI Praktikan">
            <a class="auth-brand" href="{{ route('login') }}">SI<span>Praktikan</span></a>
            <div class="intro-content">
                <p class="eyebrow">Portal akademik</p>
                <h1>Belajar dan praktikum, lebih terarah.</h1>
                <p>Masuk untuk mengakses jadwal, materi, dan tugas sesuai akun Anda.</p>
            </div>
            <p class="intro-footer">Satu akun untuk aktivitas praktikum Anda.</p>
        </section>

        <section class="auth-panel">
            <div class="auth-form-wrap">
                <p class="form-kicker">Selamat datang kembali</p>
                <h2>Masuk ke akun</h2>
                <p class="form-description">Gunakan email dan password yang sudah terdaftar.</p>

                @if ($errors->any())
                    <div class="form-alert" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="auth-form">
                    @csrf

                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                        required autofocus placeholder="nama@email.com">

                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password"
                        required placeholder="Masukkan password">

                    <label class="remember-option" for="remember">
                        <input id="remember" name="remember" type="checkbox" value="1">
                        <span>Ingat saya</span>
                    </label>

                    <button class="auth-submit" type="submit">Masuk</button>
                </form>

                <p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
            </div>
        </section>
    </main>
</body>

</html>
