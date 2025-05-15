<?php
// Koneksi ke database
include 'koneksi.php';

// Proses form jika data dikirim
$status = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password untuk keamanan

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO pengguna (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        $status = "Akun berhasil dibuat! Silakan login.";
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
    <title>Daftar Akun Baru</title>
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

        .register-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-container label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .register-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .register-container button {
            width: 100%;
            padding: 12px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .status {
            text-align: center;
            margin-top: 10px;
            color: green;
        }

        .status.error {
            color: red;
        }

        .register-container a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #4285f4;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Daftar Akun Baru</h2>
        <?php if (!empty($status)): ?>
            <p class="status <?php echo strpos($status, 'kesalahan') !== false ? 'error' : ''; ?>">
                <?php echo $status; ?>
            </p>
        <?php endif; ?>
        <form action="daftar_akun_baru.php" method="post">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Daftar</button>
        </form>
        <a href="login.php">Sudah punya akun? Login di sini</a>
    </div>
</body>
</html>