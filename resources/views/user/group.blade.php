<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-app">
                <img src="{{ asset('img/logo_pesan.png') }}" alt="">
                <h3>BahulApp</h3>
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
                <h3>Group</h3>
            </div>
            <form action="/group" method="get" autocomplete="off">
                <div class="search-box">
                    <span class="icon">
                        <img src="{{ asset('img/Search.png') }}" alt="search">
                    </span>
                    <input type="search" name="search" id="search" placeholder="Cari Grup">
                </div>
            </form>
            @foreach($groups as $group)
            <a href="/group/{{ $group->id }}" class="chat-real">
                <img src="{{ asset('img/' . ($group->gambar ?? 'default.png')) }}" alt="">
                <div class="isi-chat">
                    <p>{{ $group->nama_group }}</p>
                    <small>{{ $group->pesanTerakhir }}</small>
                </div>
            </a>
            @endforeach
        </div>
        <div class="tampilan-chat">
            <div class="tampilan-tengah">
                @isset($groupDipilih)
                <div class="profil-atas">
                    <img src="{{ asset('img/' . ($groupDipilih->gambar ?? 'default.png')) }}" alt="">
                    <p>{{ $groupDipilih->nama_group }}</p>
                </div>
                @endisset
                @isset($groupDipilih)
                @if(!$cek)
                <div class="group-cek">
                    <img src="{{ asset('img/logo_pesan.png') }}" alt="">
                    <h2>Kamu tidak di izinkan melihat isi grub ini</h2>
                </div>
                @else
                <div class="area-chat">
                    @foreach($pesanGroup as $groupPesan)
                        @if($groupPesan->pengirim_id == Auth::id())
                        <div class="pesan-saya">
                            <div class="bubble-chat">
                                <p>{{ $groupPesan->pesan }}</p>
                                <small>{{ \Carbon\Carbon::parse($groupPesan->created_at)->format('H:i') }}</small>
                            </div>
                            <img src="{{ asset('img/' . ($groupPesan->gambar ?? 'default.png')) }}" alt="">
                        </div>
                        @else
                        <div class="pesan-dia">
                            <img src="{{ asset('img/' . ($groupPesan->gambar ?? 'default.png')) }}" alt="">
                            <div class="bubble-chat">
                                <p>{{ $groupPesan->pesan }}</p>
                                <small>{{ \Carbon\Carbon::parse($groupPesan->created_at)->format('H:i') }}</small>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                
                
                <form action="/group/kirim" method="post">
                    @csrf
                    <input type="hidden" id="group-id" name="group_id" value="{{ $groupDipilih->id }}">
                    <div class="ngirim-chat">
                        <input type="text" name="pesan" placeholder="Ketik pesan" autofocus autocomplete="off" required>
                        <button type="submit"><img src="{{ asset('img/kirim.png') }}" alt=""></button>
                    </div>
                </form>
                @endif
                @else
                <div class="ketuk">
                    <img src="{{ asset('img/logo_pesan.png') }}" alt="">
                    <h2>Halo {{ Auth::user()->name }}, Klik untuk memulai chat group</h2>
                </div>
                @endisset
            </div>
        </div>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('script/dashboard.js') }}"></script>
</body>
</html>