<?php
include 'koneksi.php';

// Ambil data dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$sekolah = $_POST['sekolah'];

// Siapkan query dengan prepared statement
$stmt = $conn->prepare("INSERT INTO pendaftar (nama, alamat, no_hp, sekolah) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $alamat, $no_hp, $sekolah); // "ssss" menunjukkan 4 parameter string

// Eksekusi query
if ($stmt->execute()) {
    header("Location: pendaftaran.php?status=success");
} else {
    header("Location: pendaftaran.php?status=failed");
}

// Tutup statement
$stmt->close();
?>