<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | LinkSupply</title>
    <style>
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; display: grid; place-items: center; padding: 24px; background: #f3f6f4; color: #17231d; font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        main { width: min(100%, 420px); padding: 36px; border: 1px solid #e1e8e3; border-radius: 20px; background: #fff; box-shadow: 0 18px 50px #173d2412; }
        .brand { margin: 0 0 8px; color: #087443; font-size: 14px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
        h1 { margin: 0; font-size: 28px; letter-spacing: -.03em; }
        .intro { margin: 8px 0 26px; color: #68756d; font-size: 14px; line-height: 1.6; }
        label { display: block; margin: 18px 0 7px; font-size: 13px; font-weight: 650; }
        input[type=email], input[type=password] { width: 100%; padding: 12px 13px; border: 1px solid #d5ded8; border-radius: 10px; font: inherit; outline: none; }
        input:focus { border-color: #13834f; box-shadow: 0 0 0 3px #13834f20; }
        .remember { display: flex; align-items: center; gap: 9px; margin: 16px 0 20px; color: #526158; font-size: 13px; }
        button { width: 100%; padding: 12px; border: 0; border-radius: 10px; background: #087443; color: white; font: inherit; font-weight: 700; cursor: pointer; }
        button:hover { background: #06643a; }
        .error { margin-top: 6px; color: #b42318; font-size: 13px; }
        .alert { margin: 0 0 16px; padding: 11px 13px; border-radius: 9px; background: #fff1f0; color: #a1261d; font-size: 13px; }
        .back { display: block; margin-top: 20px; color: #526158; font-size: 13px; text-align: center; text-decoration: none; }
        .back:hover { color: #087443; }
    </style>
</head>
<body>
    <main>
        <p class="brand">LinkSupply</p>
        <h1>Masuk ke akun</h1>
        <p class="intro">Masuk untuk mengelola produk di halaman admin.</p>

        @if ($errors->any())
            <div class="alert" role="alert">Email atau password tidak cocok. Periksa kembali lalu coba lagi.</div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
            @error('email')<p class="error">{{ $message }}</p>@enderror

            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>
            @error('password')<p class="error">{{ $message }}</p>@enderror

            <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
            <button type="submit">Masuk</button>
        </form>
        <a class="back" href="{{ route('catalog.index') }}">Kembali ke halaman utama</a>
    </main>
</body>
</html>
