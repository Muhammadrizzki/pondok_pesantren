<?php
// Memulai sesi
session_start();

// Menghapus semua sesi admin
session_unset();
session_destroy();

// Redirect ke halaman login admin
header('Location: login_admin.php');
exit();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Logout - PSB MOORA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    .logout-box {
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }

    .logout-box h2 {
      margin-bottom: 20px;
    }

    .logout-box a {
      text-decoration: none;
      color: white;
      background-color: #1abc9c;
      padding: 10px 20px;
      border-radius: 5px;
    }

    .logout-box a:hover {
      background-color: #16a085;
    }
  </style>
</head>
<body>
  <div class="logout-box">
    <h2>Anda telah logout.</h2>
    <p>Terima kasih telah menggunakan sistem PSB MOORA.</p>
    <a href="login_admin.php">Login Kembali</a>
  </div>
</body>
</html>