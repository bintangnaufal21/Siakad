@props(['title' => 'Admin', 'stylesheet' => 'dashboard'])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} | Siakad Admin</title>
    <link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('cssAdmin/' . $stylesheet . '.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar Toggle Checkbox -->
    <input type="checkbox" id="sidebar-toggle">
    <label for="sidebar-toggle" class="toggle-btn">
        <i class="fa-solid fa-bars"></i>
    </label>
    <aside class="sidebar">
        <div class="brand">
            <span>Siakad Admin</span>
        </div>

        <ul class="menu">
            <li @class(['active' => request()->routeIs('admin.dashboard')])>
              <a href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>
                <i class="fa-solid fa-gauge"></i> Dashboard
              </a>
            </li>
            <li @class(['active' => request()->routeIs('admin.tugas')])>
              <a href="{{ route('admin.tugas') }}" @if (request()->routeIs('admin.tugas')) aria-current="page" @endif>
                <i class="fa-solid fa-user-check"></i> Tugas kuliah
              </a>
            </li>
            <li @class(['active' => request()->routeIs('admin.jadwal')])>
              <a href="{{ route('admin.jadwal') }}" @if (request()->routeIs('admin.jadwal')) aria-current="page" @endif>
                <i class="fa-solid fa-book-open"></i> Jadwal Kuliah
              </a>
            </li>
            <li @class(['active' => request()->routeIs('admin.materi')])>
              <a href="{{ route('admin.materi') }}" @if (request()->routeIs('admin.materi')) aria-current="page" @endif>
                <i class="fa-solid fa-book-open"></i> Materi Pelajaran
              </a>
            </li>
        </ul>

        <div class="sidebar-bottom">
            <div class="user-box">
                <div class="avatar">A</div>
                <div>
                    <p class="username">{{ auth()->user()->name }}</p>
                    <p class="role">{{ auth()->user()->role }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="sidebar-logout" type="submit">Keluar</button>
            </form>
        </div>
    </aside>

    <!-- Main content -->
    <main class="main-content">
        {{ $slot }}
    </main>

</body>

</html>
