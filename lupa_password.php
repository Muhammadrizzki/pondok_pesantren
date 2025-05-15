<?php
// Koneksi ke database
include 'koneksi.php';

// Proses form jika data dikirim
$status = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Query untuk memeriksa apakah email terdaftar
    $query = "SELECT * FROM pengguna WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika email ditemukan, kirim tautan reset password
        $status = "Tautan reset password telah dikirim ke email Anda.";
        // Logika pengiriman email dapat dimasukkan di sini
    } else {
        $status = "Email tidak ditemukan. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
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
        .forgot-password-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .forgot-password-container h2 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 10px;
        }
        .forgot-password-container p {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        .forgot-password-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .forgot-password-container input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .forgot-password-container button {
            width: 100%;
            background-color: #4285f4;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }
        .forgot-password-container a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4285f4;
            text-decoration: none;
            font-size: 14px;
        }
        .status-message {
            text-align: center;
            color: green;
            margin-top: 20px;
        }
        .status-error {
            text-align: center;
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <h2>Lupa Password?</h2>
        <p>Masukkan email yang terkait dengan akun Anda</p>
        <?php if (!empty($status)): ?>
            <p class="<?php echo strpos($status, 'tidak') !== false ? 'status-error' : 'status-message'; ?>">
                <?php echo $status; ?>
            </p>
        <?php endif; ?>
        <form action="lupa_password.php" method="POST">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
            <button type="submit">Kirim Link Reset</button>
        </form>
        <a href="login.php">Kembali ke Login</a>
    </div>
</body>
</html>