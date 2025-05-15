<?php
// Koneksi ke database
include 'koneksi.php';

// Proses data jika form dikirimkan
$status = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $alamat_email = $_POST['alamat_email'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $nomor_hp = $_POST['nomor_hp'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO pendaftar (nama, nik, tempat_lahir, tanggal_lahir, alamat, alamat_email, asal_sekolah, nomor_hp, tanggal_daftar) 
              VALUES ('$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$alamat_email', '$asal_sekolah', '$nomor_hp', '$tanggal_daftar')";
    if (mysqli_query($conn, $query)) {
        $status = "Pendaftaran berhasil disimpan!";
    } else {
        $status = "Terjadi kesalahan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran - Ponpes Moderat At-Thohiriyah</title>
    <link rel="stylesheet" href="pendaftaran.css">
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
                <li><a href="profile.php">PROFILE</a></li>
                <li><a href="kegiatan.php">KEGIATAN</a></li>
                <li><a class="active" href="pendaftaran.php">PENDAFTARAN</a></li>
                <li><a href="hasil_seleksi_user.php">HASIL SELEKSI</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li><a href="logout_user.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <main class="form-container">
        <h2>Formulir Pendaftaran Santri Baru</h2>
        <?php if (!empty($status)): ?>
            <p style="color: green;"><?php echo $status; ?></p>
        <?php endif; ?>
        <form action="pendaftaran.php" method="post" class="form-pendaftaran">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nik">NIK (Nomor Induk Kependudukan):</label>
            <input type="text" id="nik" name="nik" required>

            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

            <label for="alamat">Alamat Lengkap:</label>
            <textarea id="alamat" name="alamat" rows="3" required></textarea>

            <label for="alamat_email">Alamat Email:</label>
            <input type="text" id="alamat_email" name="alamat_email" required>

            <label for="asal_sekolah">Asal Sekolah:</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" required>

            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required>

            <label for="tanggal_daftar">Tanggal Daftar:</label>
            <input type="date" id="tanggal_daftar" name="tanggal_daftar" required>

            <button type="submit">Kirim Pendaftaran</button>
        </form>
    </main>
</body>
</html>