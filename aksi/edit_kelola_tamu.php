<?php
session_start();
// Sertakan file koneksi database
include '../koneksi.php';

// Periksa apakah form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Buat query update
    $query = "UPDATE tamu SET nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', email = '$email', telepon = '$telepon' WHERE id = '$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result > 0) {
        echo 'Kamar berhasil di ubah';
        header("Location: ../resepsionis/kelola_tamu.php");
    }
}
