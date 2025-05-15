<?php
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login_admin.php');
    exit();
}

// Anda dapat menambahkan logika tambahan untuk mengambil informasi admin dari database jika diperlukan
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin - PSB Metode MOORA</title>
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

  <div class="sidebar">
    <h4>SISTEM PSB<br>Metode MOORA</h4>
    <a href="#"><i class="bi bi-person"></i> Admin</a>
    <a href="form_input.php"><i class="bi bi-pencil-square"></i> Forms Input</a>
    <a href="admin_hasil_seleksi.php"><i class="bi bi-table"></i> Hasil Seleksi</a>
    <a href="grafik_admin.php"><i class="bi bi-bar-chart"></i> Grafik</a>
    <a href="logout_admin.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>

  <div class="main">
    <div class="navbar">
      <div class="title">SISTEM PENDUKUNG KEPUTUSAN PSB MENGGUNAKAN METODE MOORA</div>
      <div>
        <input type="text" placeholder="Search...">
      </div>
    </div>

    <div class="content">
      <h2>ADMIN</h2>
      <hr>
      <p>SELAMAT DATANG ADMIN</p>
    </div>

    <div class="footer">
      Designed by <a href="https://bootstrapmade.com" target="_blank">BootstrapMade</a>
    </div>
  </div>

</body>
</html>