<?php
// Koneksi ke database
include 'koneksi.php';

// Mengambil data kegiatan dari database
$query = "SELECT * FROM kegiatan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan - Ponpes Moderat At-Thohiriyah</title>
    <link rel="stylesheet" href="kegiatan.css">
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
                <li><a class="active" href="kegiatan.php">KEGIATAN</a></li>
                <li><a href="pendaftaran.php">PENDAFTARAN</a></li>
                <li><a href="hasil_seleksi_user.php">HASIL SELEKSI</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li><a href="logout_user.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <main class="kegiatan-container">
        <h2>Kegiatan di Ponpes At-Thohiriyah</h2>
        <div class="kegiatan-list">
            <?php
            if ($result && mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)):
            ?>
            <div class="kegiatan-item">
                <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>">
                <h3><?php echo htmlspecialchars($row['judul']); ?></h3>
                <p><?php echo htmlspecialchars($row['deskripsi']); ?></p>
            </div>
            <?php
                endwhile;
            else:
            ?>
            <p>Tidak ada kegiatan yang tersedia saat ini.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>