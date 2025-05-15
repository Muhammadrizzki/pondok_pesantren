<?php
// Koneksi ke database
include 'koneksi.php';

// Anda bisa menambahkan logika untuk mengambil data profil dari database jika diperlukan
// Misalnya, mengambil data visi, misi, struktur kepengurusan, dan sejarah dari tabel di database
// Contoh query: SELECT * FROM profil WHERE section = 'visi';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Ponpes Moderat At-Thohiriyah</title>
    <link rel="stylesheet" href="pondok.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="lambang ppm.jpeg" alt="Logo Ponpes" />
            <div class="nama-lembaga">
                <h1>Pondok Pesantren Moderat At-Thohiriyah</h1>
            </div>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="index_user.php">BERANDA</a></li>
                <li><a class="active" href="profile.php">PROFILE</a></li>
                <li><a href="kegiatan.php">KEGIATAN</a></li>
                <li><a href="pendaftaran.php">PENDAFTARAN</a></li>
                <li><a href="hasil_seleksi_user.php">HASIL SELEKSI</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li><a href="logout_user.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <main class="form-container">
        <h2>Profil Pondok Pesantren</h2>
        
        <section>
            <h3>Visi</h3>
            <p>
                Menjadi lembaga pendidikan Islam yang moderat, unggul dalam ilmu agama dan umum,
                serta mampu melahirkan generasi yang berakhlakul karimah, toleran, dan cinta tanah air.
            </p>
        </section>

        <section>
            <h3>Misi</h3>
            <ul>
                <li>Menyelenggarakan pendidikan berbasis kitab kuning dan Al-Qur'an.</li>
                <li>Menanamkan nilai-nilai moderasi beragama dalam kehidupan santri.</li>
                <li>Mengembangkan potensi santri dalam bidang akademik dan non-akademik.</li>
                <li>Menjadi pusat dakwah Islam yang damai dan inklusif.</li>
            </ul>
        </section>

        <section>
            <h3>Struktur Kepengurusan</h3>
            <ul>
                <li><strong>Pimpinan:</strong> KH. Ahmad Thohir</li>
                <li><strong>Wakil Pimpinan:</strong> Ust. Abdul Karim</li>
                <li><strong>Pengasuh Putra:</strong> Ust. M. Irfan</li>
                <li><strong>Pengasuh Putri:</strong> Ustazah Siti Maryam</li>
            </ul>
        </section>

        <section>
            <h3>Sejarah Singkat</h3>
            <p>
                Pondok Pesantren Moderat At-Thohiriyah berdiri pada tahun 1990 sebagai respons atas kebutuhan akan
                pendidikan agama Islam yang seimbang, toleran, dan berpijak pada tradisi Ahlussunnah wal Jama'ah.
            </p>
        </section>
    </main>
</body>
</html>