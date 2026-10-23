<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | LaporBanjir</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        header, footer { background: #f5f5f5; padding: 10px; text-align: center; }
        nav a { margin: 0 10px; text-decoration: none; color: #1a56a0; }
        nav a:hover { text-decoration: underline; }
        nav form { display: inline; }
        nav .linkbtn { margin: 0 10px; padding: 0; background: none; color: #1a56a0; border: none; cursor: pointer; font-size: 1em; }
        nav .linkbtn:hover { text-decoration: underline; }
        main { max-width: 800px; margin: 20px auto; }
        .card { border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 6px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px 20px; background: #1a56a0; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
    <header>
        <h1>LaporBanjir</h1>
        <p>Sistem Pelaporan Banjir BPBD Kabupaten Bandung</p>
        <nav>
            <a href="{{ route('laporan.create') }}">Buat Laporan</a>
            @auth
                <a href="{{ route('laporan.index') }}">Daftar Laporan</a>
                <a href="{{ route('profil') }}">Profil Petugas</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="linkbtn">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 LaporBanjir - Ranu Adha</p>
    </footer>
</body>
</html>