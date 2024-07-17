<?php
session_start();
// Sertakan file koneksi database
include '../koneksi.php';

// Periksa apakah form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $email = $_POST['email'];
    $peran = $_POST['peran'];

    // Buat query update
    $query = "UPDATE pengguna SET nama_pengguna = '$nama_pengguna', email = '$email', peran = '$peran' WHERE id = '$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result > 0) {
        echo 'Data berhasil di ubah';
        header("Location: ../user/manajemen_pengguna.php");
    }
}
