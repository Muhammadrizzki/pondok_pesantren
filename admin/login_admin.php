<?php
session_start();

// Koneksi ke database
include '../koneksi.php';

// Inisialisasi variabel error
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        $error = 'Username dan password wajib diisi.';
    } else {
        // Query untuk memeriksa kredensial admin
        $query = "SELECT * FROM admin WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) === 1) {
            $admin = mysqli_fetch_assoc($result);

            // Verifikasi password
            if (password_verify($password, $admin['password'])) {
                // Set session
                $_SESSION['admin_id'] = $admin['id'];
                header('Location: index_admin.php');
                exit();
            } else {
                $error = 'Password salah.';
            }
        } else {
            $error = 'Username tidak ditemukan.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Admin</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background-color: white;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 10px;
    }

    p {
      text-align: center;
      color: #666;
      margin-bottom: 30px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .options a {
      text-decoration: none;
      color: #4285f4;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #4285f4;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .register {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .register a {
      color: #4285f4;
      text-decoration: none;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Selamat Datang</h2>
    <p>Silakan masuk untuk melanjutkan</p>
    <form method="POST" action="login_admin.php">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Masukkan username Anda" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required />

      <div class="options">
        <label><input type="checkbox" /> Ingat saya</label>
        <a href="lupa_password.php">Lupa password?</a>
      </div>

      <button type="submit">Masuk</button>
      <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <div class="register">
        Belum punya akun? <a href="../pendaftaran_admin.php">Daftar sekarang</a>
      </div>
    </form>
  </div>
</body>
</html>