<?php
// Memulai sesi
session_start();

// Jika pengguna belum login, arahkan ke halaman login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Anda dapat menambahkan logika untuk mengambil informasi pengguna dari database jika diperlukan
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponpes Moderat At-Thohiriyah</title>
    <link rel="stylesheet" href="pondok.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="lambang ppm.jpeg" alt="Logo Ponpes" />
            <div class="Pondok Pesantren Moderat At-Thohiriyah serang">
                <h1>Pondok Pesantren Moderat At-Thohiriyah</h1>
            </div>
        </div>
        <nav>
            <ul class="menu">
                <li><a class="active" href="index_user.php">BERANDA</a></li>
                <li class="dropdown">
                    <a href="profile.php">PROFILE</a>
                    <div class="dropdown-content">
                        <a href="#">Visi & Misi</a>
                        <a href="#">Struktur</a>
                        <a href="#">Sejarah</a>
                    </div>
                </li>
                <li><a href="kegiatan.php">KEGIATAN</a></li>
                <li><a href="pendaftaran.php">PENDAFTARAN</a></li>
                <li><a href="hasil_seleksi_user.php">HASIL SELEKSI</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li><a href="logout_user.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <img class="main-image" src="ppm.jpeg" alt="Gedung Ponpes">
    </main>
</body>
</html>