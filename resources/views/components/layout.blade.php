<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'SI Praktikan' }}</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- Header --}}
    <header class="site-header">
        <div class="container header-inner">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="logo">
                SI<span>Praktikan</span>
            </a>

            {{-- Navigation --}}
            <nav class="main-nav" id="mainNav">
                <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('user.jadwal') }}" class="{{ request()->routeIs('user.jadwal') ? 'active' : '' }}">Jadwal</a>
                <a href="{{ route('user.materi') }}" class="{{ request()->routeIs('user.materi') ? 'active' : '' }}">Materi</a>
                <a href="{{ route('user.tugas') }}" class="{{ request()->routeIs('user.tugas') ? 'active' : '' }}">Tugas</a>
                <a href="{{ route('user.kontak') }}" class="{{ request()->routeIs('user.kontak') ? 'active' : '' }}">Kontak
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-small btn-primary" type="submit">Keluar</button>
            </form>

            {{-- Mobile Menu Button --}}
            <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>
    </header>

    {{-- Main Content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="site-footer">
        <div class="container">
            <p>
                &copy; {{ date('Y') }} SI Praktikan. All rights reserved.
            </p>
        </div>
    </footer>

    {{-- Mobile Menu Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const mainNav = document.getElementById('mainNav');

            if (menuToggle && mainNav) {
                menuToggle.addEventListener('click', function() {
                    mainNav.classList.toggle('show');

                    const expanded =
                        mainNav.classList.contains('show');

                    menuToggle.setAttribute(
                        'aria-expanded',
                        expanded
                    );
                });
            }
        });
    </script>

</body>

</html>
