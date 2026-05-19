<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-login">
        <div class="welcome">
            <h1>Selamat Datang Kembali</h1>
            <p>Login ke akun kamu untuk melanjutkan</p>
            <img src="../img/logo_pesan.png" alt="logo">
        </div>
        
        <div class="kotak-form-login">
            <h2>Login</h2>
            <form action="/login" method="post" autocomplete="off">
                @csrf
                @error('login')
                <div class="pesan-error">
                    {{ $message }}
                </div>
                @enderror
                <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')}}" id="email" class="input @error('email') error @enderror" placeholder="Cth: misbahul@gmail.com">
                @error('email')
                    <div class="pesan-error">
                        {{ $message }}
                    </div>
                @enderror
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input @error('password') error @enderror" placeholder="Masukkan Password">
                @error('password')
                    <div class="pesan-error">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit">Login</button>
                <div class="pengguna-baru">
                    <p>Belum mempunyai akun?<a href="/register">Daftar</a></p>
                </div>
            </form>
        </div>
        <div class="mode-gelap">
            <button id="tombol"><img src="../img/bulan.png" alt="modegelap"></button>
        </div>
    </div>
    <script src="../script/script.js"></script>
</body>
</html>