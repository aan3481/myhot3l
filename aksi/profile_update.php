<?php
session_start();
include "../koneksi.php";

$id = $_POST['id'];

// Update data umum
$nama_depan = $_POST['nama_depan'];
$nama_belakang = $_POST['nama_belakang'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];

$query = "UPDATE tamu SET nama_depan = ?, nama_belakang = ?, email = ?, telepon = ? WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "ssssi", $nama_depan, $nama_belakang, $email, $telepon, $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($koneksi);

// Redirect kembali ke halaman profil
header("location: ../tamu/profile.php");
exit;
