<?php
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login_admin.php');
    exit();
}

// Koneksi ke database
include '../koneksi.php';

// Ambil data hasil seleksi dari database
$query = "SELECT * FROM hasil_seleksi";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Hasil Seleksi</title>
    <link rel="stylesheet" href="admin_hasil_seleksi.css">
    <style>
        .admin-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        input, select {
            padding: 8px;
            margin: 5px;
        }

        .form-inline {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .form-inline input, .form-inline select, .form-inline button {
            flex: 1;
        }

        .btn-edit, .btn-delete {
            cursor: pointer;
            padding: 4px 10px;
            border-radius: 4px;
            color: white;
        }

        .btn-edit { background-color: #3498db; }
        .btn-delete { background-color: #e74c3c; }
    </style>
</head>
<body>
    <div class="admin-container">
        <h2>Kelola Hasil Seleksi Santri</h2>

        <div class="form-inline">
            <form action="tambah_hasil_seleksi.php" method="post">
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="text" name="nomor_pendaftaran" placeholder="No. Pendaftaran" required>
                <select name="status" required>
                    <option value="Lulus">Lulus</option>
                    <option value="Tidak Lulus">Tidak Lulus</option>
                </select>
                <button type="submit">Tambah</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. Pendaftaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['nomor_pendaftaran']) ?></td>
                            <td><?= htmlspecialchars($row['status']) ?></td>
                            <td>
                                <a href="edit_hasil_seleksi.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                                <a href="hapus_hasil_seleksi.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Belum ada data hasil seleksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>