<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-daftar">

        <div class="welcome">
            <h1>Buat Akun</h1>
            <p>Daftar untuk dapat memulai interaksi dengan orang lain</p>
            <img src="../img/logo_pesan.png" alt="logo">
        </div>

        <div class="kotak-form-daftar">
            <h2>Register</h2>
            <form action="/register" method="post" autocomplete="off">
                @csrf
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="name" id="nama" class="input @error('name') error @enderror" placeholder="Cth: Misbahul munir">
                @error('name')
                    <div class="pesan-error">
                        {{ $message }}
                    </div>
                @enderror
        
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="misbahul@gmail.com" value="{{old('email')}}" class="input @error('email') error @enderror">
                @error('email')
                    <div class="pesan-error">
                        {{ $message }}
                    </div>
                @enderror
        
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input @error('password') error @enderror" placeholder="Masukkan Password kamu">
                @error('password')
                    <div class="pesan-error">
                        {{ $message }}
                    </div>
                @enderror
        
                <label for="confirm">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm" class="input @error('password') error @enderror" placeholder="Konfirmasi Password">
                @error('confirm_password')
                    <div class="pesan-error">
                        {{ $message }}
                    </div>
                @enderror
        
                <button type="submit">Register</button>
                <div class="pengguna-baru">
                    <p>sudah punya akun? silahkan <a href="/login">Login</a></p>
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