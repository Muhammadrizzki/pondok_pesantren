<?php
// Koneksi ke database
include 'koneksi.php';

// Mengambil data hasil seleksi dari database
$query = "SELECT * FROM hasil_seleksi";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Seleksi - Ponpes Moderat At-Thohiriyah</title>
    <link rel="stylesheet" href="hasil_seleksi.css">
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
                <li><a class="active" href="hasil_seleksi_user.php">HASIL SELEKSI</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li><a href="logout_user.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <main class="hasil-container">
        <h2>Hasil Seleksi Calon Santri Baru</h2>
        <p>Berikut adalah daftar hasil seleksi santri baru tahun ajaran 2025/2026:</p>

        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. Pendaftaran</th>
                    <th>Nilai Akademik</th>
                    <th>IQ</th>
                    <th>Keagamaan</th>
                    <th>Keterampilan Non-Akademik</th>
                    <th>Total</th>
                    <th>Nilai</th>
                    <th>Status</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0):
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['no_pendaftaran']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai_akademik']); ?></td>
                    <td><?php echo htmlspecialchars($row['iq']); ?></td>
                    <td><?php echo htmlspecialchars($row['keagamaan']); ?></td>
                    <td><?php echo htmlspecialchars($row['non_akademik']); ?></td>
                    <td><?php echo htmlspecialchars($row['total']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai']); ?></td>
                    <td style="color: <?php echo $row['status'] == 'Lulus' ? 'green' : 'red'; ?>">
                        <strong><?php echo htmlspecialchars($row['status']); ?></strong>
                    </td>
                    <td><?php echo htmlspecialchars($row['kelas']); ?></td>
                </tr>
                <?php
                    endwhile;
                else:
                ?>
                <tr>
                    <td colspan="11" style="text-align: center;">Tidak ada data hasil seleksi.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>