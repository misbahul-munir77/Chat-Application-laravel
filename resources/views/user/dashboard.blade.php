<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-app">
                <img src="{{ asset('img/logo_pesan.png') }}" alt="">
                <h3>ChatApp</h3>
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
        <div class="daftar-user">
            <div class="bungkus-side">
                <button class="toogle-btn" id="toogle-btn">
                    <img src="{{ asset('img/Menu.png') }}" alt="">
                </button>
                <h3>Chats</h3>
            </div>
            <form action="/user" method="get" autocomplete="off">
                <div class="search-box">
                    <span class="icon">
                        <img src="{{ asset('img/Search.png') }}" alt="search">
                    </span>
                    <input type="search" name="search" id="search" placeholder="Cari obrolan">
                </div>
            </form>
            @foreach($users as $user)
            <a href="/user/{{ $user->id }}" class="chat-real">
                <img src="{{ asset('img/' . ($user->gambar ?? 'user.png')) }}" alt="">
                <div class="isi-chat">
                    <p>{{ $user->name }}</p>
                    <small>{{ $user->pesanTerakhir }}</small>
                </div>
            </a>
            @endforeach
        </div>
        <div class="tampilan-chat">
            <div class="tampilan-tengah">
                @isset($userDipilih)
                <div class="profil-atas">
                    <img src="{{ asset('img/' . ($userDipilih->gambar ?? 'user.png')) }}" alt="">
                    <p>{{ $userDipilih->name }}</p>
                    <p class="status-user" id="status-{{ $userDipilih->id }}">Offline</p>
                </div>
                @endisset
                @isset($userDipilih)
                <div class="area-chat">
                    @foreach($pesan as $message)
                        @if($message->pengirim_id == Auth::id())
                        <div class="pesan-saya">
                            <div class="bubble-chat">
                                <p>{{ $message->pesan }}</p>
                                <small>{{ \Carbon\Carbon::parse($message->created_at)->format('H:i') }}</small>
                            </div>
                        </div>
                        @else
                        <div class="pesan-dia">
                            <div class="bubble-chat">
                                <p>{{ $message->pesan }}</p>
                                <small>{{ \Carbon\Carbon::parse($message->created_at)->format('H:i') }}</small>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                
                <form action="../kirimpesan" method="post">
                    @csrf
                    <input type="hidden" name="penerima_id" value="{{ $userDipilih->id }}">
                    <div class="ngirim-chat">
                        <input type="text" name="pesan" placeholder="Ketik pesan. . ." autofocus autocomplete="off" required>
                        <button type="submit"><img src="{{ asset('img/kirim.png') }}" alt=""></button>
                    </div>
                </form>
                @else
                <div class="ketuk">
                    <img src="{{ asset('img/logo_pesan.png') }}" alt="">
                    <h2>Halo {{ Auth::user()->name }}, Klik seseorang untuk memulai chat</h2>
                </div>
                @endisset
            </div>
        </div>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('script/dashboard.js') }}"></script>
</body>
</html>