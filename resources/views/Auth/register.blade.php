<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar | SI Praktikan</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body class="auth-page">
    <main class="auth-shell">
        <section class="auth-intro" aria-label="Informasi SI Praktikan">
            <a class="auth-brand" href="{{ route('register') }}">SI<span>Praktikan</span></a>
            <div class="intro-content">
                <p class="eyebrow">Mulai sekarang</p>
                <h1>Semua kebutuhan praktikum di satu tempat.</h1>
                <p>Buat akun untuk melihat jadwal, materi, dan tugas praktikum Anda.</p>
            </div>
            <p class="intro-footer">Pendaftaran baru otomatis menggunakan role user.</p>
        </section>

        <section class="auth-panel">
            <div class="auth-form-wrap">
                <p class="form-kicker">Bergabung dengan SI Praktikan</p>
                <h2>Buat akun baru</h2>
                <p class="form-description">Isi data berikut untuk mendaftar sebagai user.</p>

                @if ($errors->any())
                    <div class="form-alert" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="auth-form">
                    @csrf

                    <label for="name">Nama lengkap</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name"
                        required autofocus placeholder="Nama Anda">

                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                        required placeholder="nama@email.com">

                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" minlength="8"
                        required placeholder="Minimal 8 karakter">

                    <label for="password_confirmation">Konfirmasi password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        autocomplete="new-password" minlength="8" required placeholder="Ulangi password">

                    <button class="auth-submit" type="submit">Daftar sebagai user</button>
                </form>

                <p class="auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
        </section>
    </main>
</body>

</html>
