const sidebar = document.querySelector('.sidebar');
const daftarUser = document.querySelector('.daftar-user');
const toggleBtn = document.getElementById('toogle-btn');

// Cek memori browser saat halaman di-refresh
if (localStorage.getItem('sidebar-status') === 'close') {
    sidebar.classList.add('close');
    daftarUser.classList.add('full');
}

toggleBtn.addEventListener('click', function() {
    sidebar.classList.toggle('close');
    daftarUser.classList.toggle('full');

    if (sidebar.classList.contains('close')) {
        localStorage.setItem('sidebar-status', 'close');
    } else {
        localStorage.setItem('sidebar-status', 'open');
    }
});