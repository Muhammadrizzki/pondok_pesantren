<?php
// Koneksi ke database
include 'koneksi.php';

// Proses form jika ada data yang dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Query untuk menyimpan pesan ke database
    $query = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    if (mysqli_query($conn, $query)) {
        $status = "Pesan Anda berhasil dikirim!";
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
    <title>Kontak - Ponpes Moderat At-Thohiriyah</title>
    <link rel="stylesheet" href="kontak.css">
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
                <li><a href="pendaftaran.php">PENDAFTARAN</a></li>
                <li><a href="hasil_seleksi_user.php">HASIL SELEKSI</a></li>
                <li><a class="active" href="kontak.php">KONTAK</a></li>
                <li><a href="logout_user.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <img class="main-image" src="ppm.jpeg" alt="Gedung Ponpes">
    </main>

    <main class="kontak-container">
        <h2>Hubungi Kami</h2>
        <div class="kontak-info">
            <p><strong>Alamat:</strong> Jalan Raya Cilegon 42161 Serang Banten</p>
            <p><strong>Email:</strong> at-thohiriyah@gmail.com</p>
            <p><strong>Telepon:</strong> +62 812-3456-7890</p>
        </div>

        <h3>Kirim Pesan</h3>
        <?php if (isset($status)): ?>
            <p style="color: green;"><?php echo $status; ?></p>
        <?php endif; ?>
        <form action="kontak.php" method="post" class="form-kontak">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="pesan">Pesan:</label>
            <textarea id="pesan" name="pesan" rows="5" required></textarea>

            <button type="submit">Kirim</button>
        </form>
    </main>
</body>
</html>