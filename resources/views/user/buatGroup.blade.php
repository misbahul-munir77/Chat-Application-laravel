<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
    <link rel="stylesheet" href="{{ asset('css/buat.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="sidebar">
            <div class="logo-app">
                <img src="{{ asset('img/logo_pesan.png') }}" alt="">
                <h3>HullApp</h3>
            </div>
            <div class="menu-href">
                <a href="/user" class="chat">
                    <img src="{{ asset('img/Chat.png') }}" alt="">
                    <p>Chat</p>
                </a>
                <a href="/group" class="group">
                    <img src="{{ asset('img/Group.png') }}" alt="">
                    <p>Group</p>
                </a>
            </div>
            <a href="/logout" class="logout" onclick="return confirm('yakin anda ingin logout?')">
                <img src="{{ asset('img/Logout.png') }}" alt="">
                <p>Logout</p>
            </a>
        </div>
        <div class="main-content">
            <div class="kotak">
                <div class="isi">
                    <img src="{{ asset('img/Group.png') }}" alt="">
                    <div class="bungkus">
                        <h2>Buat grub yuk</h2>
                        <p>buat grub untuk menemukan banyak teman</p>
                    </div>
                </div>
                <div class="tambah">
                    <h2>Buat Grup</h2>
                    <form action="/buat" method="post">
                        @csrf
                        <input type="text" name="nama_group" placeholder="Nama Group" autocomplete="off">
                            <div class="pilih-anggota-container">
                                <label class="label-grup">Pilih Anggota Grup:</label>
                                <div class="user-scroll-box">
                                    @foreach($users as $user)
                                        <label class="user-card">
                                            <input type="checkbox" name="user_id[]" value="{{ $user->id }}">
                                            <span class="user-name">{{ $user->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        <button type="submit">Buat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>