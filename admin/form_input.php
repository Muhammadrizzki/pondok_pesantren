<?php
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login_admin.php');
    exit();
}

// Koneksi ke database
include '../koneksi.php';

// Inisialisasi pesan status
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $no_pendaftaran = $_POST['no_pendaftaran'];
    $nilai_akademik = $_POST['nilai_akademik'];
    $nilai_iq = $_POST['nilai_iq'];
    $nilai_keagamaan = $_POST['nilai_keagamaan'];
    $nilai_non_akademik = $_POST['nilai_non_akademik'];
    $kelas = $_POST['kelas'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO calon_santri 
                (nama, no_pendaftaran, nilai_akademik, nilai_iq, nilai_keagamaan, nilai_non_akademik, kelas) 
              VALUES 
                ('$nama', '$no_pendaftaran', '$nilai_akademik', '$nilai_iq', '$nilai_keagamaan', '$nilai_non_akademik', '$kelas')";
    
    if (mysqli_query($conn, $query)) {
        $status = "Data berhasil disimpan!";
    } else {
        $status = "Terjadi kesalahan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Forms Input - PSB Metode MOORA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      height: 100vh;
      background-color: #2c3e50;
      color: #fff;
      padding-top: 20px;
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 14px;
      text-transform: uppercase;
    }

    .sidebar a {
      display: block;
      color: #fff;
      padding: 12px 20px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #1abc9c;
    }

    .main {
      margin-left: 220px;
    }

    .navbar {
      background-color: #34495e;
      color: white;
      padding: 15px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar .title {
      font-weight: bold;
    }

    .navbar input[type="text"] {
      border-radius: 5px;
      border: none;
      padding: 5px 10px;
    }

    .content {
      padding: 40px 30px;
    }

    .footer {
      text-align: center;
      padding: 20px;
      color: #999;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4>SISTEM PSB<br>Metode MOORA</h4>
    <a href="index_admin.php"><i class="bi bi-person"></i> Admin</a>
    <a href="form_input.php"><i class="bi bi-pencil-square"></i> Forms Input</a>
    <a href="admin_hasil_seleksi.php"><i class="bi bi-table"></i> Hasil Seleksi</a>
    <a href="grafik_admin.php"><i class="bi bi-bar-chart"></i> Grafik</a>
    <a href="logout_admin.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="navbar">
      <div class="title">SISTEM PENDUKUNG KEPUTUSAN PSB MENGGUNAKAN METODE MOORA</div>
      <div>
        <input type="text" placeholder="Search...">
      </div>
    </div>

    <div class="content">
      <h2>Form Input Calon Santri</h2>
      <hr>

      <?php if (!empty($status)): ?>
        <div class="alert alert-info"><?= htmlspecialchars($status) ?></div>
      <?php endif; ?>

      <form method="POST" action="form_input.php">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
          <label for="no_pendaftaran" class="form-label">No. Pendaftaran</label>
          <input type="text" class="form-control" id="no_pendaftaran" name="no_pendaftaran" required>
        </div>

        <div class="mb-3">
          <label for="akademik" class="form-label">Nilai Akademik</label>
          <input type="number" class="form-control" id="akademik" name="nilai_akademik" min="0" max="100" required>
        </div>

        <div class="mb-3">
          <label for="iq" class="form-label">Nilai IQ</label>
          <input type="number" class="form-control" id="iq" name="nilai_iq" min="0" max="150" required>
        </div>

        <div class="mb-3">
          <label for="keagamaan" class="form-label">Nilai Keagamaan</label>
          <input type="number" class="form-control" id="keagamaan" name="nilai_keagamaan" min="0" max="100" required>
        </div>

        <div class="mb-3">
          <label for="non_akademik" class="form-label">Nilai Keterampilan Non-Akademik</label>
          <input type="number" class="form-control" id="non_akademik" name="nilai_non_akademik" min="0" max="100" required>
        </div>

        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <select class="form-select" id="kelas" name="kelas" required>
            <option value="">Pilih Kelas</option>
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>

    <div class="footer">
      Designed by <a href="https://bootstrapmade.com" target="_blank">BootstrapMade</a>
    </div>
  </div>

</body>
</html>