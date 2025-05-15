<?php
// Memulai sesi
session_start();

// Menghapus semua sesi
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .logout-box {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            text-align: center;
        }

        .logout-box h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .logout-box a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-box a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="logout-box">
        <h2>Anda telah berhasil logout.</h2>
        <a href="login.php">Kembali ke Login</a>
    </div>
</body>
</html>