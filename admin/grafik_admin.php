<?php
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login_admin.php');
    exit();
}

// Koneksi ke database
include '../koneksi.php';

// Query untuk mendapatkan data statistik pendaftar
$query = "SELECT tahun, COUNT(*) AS total FROM pendaftar GROUP BY tahun ORDER BY tahun ASC";
$result = mysqli_query($conn, $query);

$labels = [];
$data = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['tahun'];
        $data[] = $row['total'];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Grafik PSB - MOORA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    canvas {
      max-width: 100%;
      height: auto;
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
      <h2>Grafik Statistik Pendaftar</h2>
      <hr>

      <div class="row">
        <div class="col-md-6">
          <h5>Total Pendaftar per Tahun</h5>
          <canvas id="chartPendaftar"></canvas>
        </div>
      </div>
    </div>

    <div class="footer">
      Designed by <a href="https://bootstrapmade.com" target="_blank">BootstrapMade</a>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('chartPendaftar').getContext('2d');
    const chartPendaftar = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
          label: 'Total Pendaftar',
          data: <?= json_encode($data) ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

</body>
</html>