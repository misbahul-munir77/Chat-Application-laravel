# Realtime Chat App Laravel

Aplikasi chat realtime berbasis Laravel yang mendukung private chat dan group chat menggunakan WebSocket.

## Fitur

- Login & Register
- Authentication Laravel
- Private Chat Realtime
- Group Chat Realtime
- Online & Offline Status
- Daftar User
- Daftar Group
- Validasi Akses Group
- Realtime menggunakan Laravel Echo & Reverb

---

## Teknologi

- Laravel
- MySQL
- Laravel Reverb
- Laravel Echo
- JavaScript
- Blade Template
- CSS

---

## Cara Install

Clone repository:
1. Clone repo ini
2. Copy .env.example jadi .env
3. Isi konfigurasi database di file .env
4. Jalankan perintah berikut:
```bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve
php artisan reverb:start
npm.cmd run dev
```
5. jalankan http://127.0.0.1:8000/ di browser

catatan
project ini mesih dalam tahap pengembangan