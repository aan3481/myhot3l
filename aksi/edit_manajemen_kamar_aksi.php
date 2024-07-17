<?php
session_start();
// Sertakan file koneksi database
include '../koneksi.php';

// Periksa apakah form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $nomor_kamar = $_POST['nomor_kamar'];
    $jenis_kamar = $_POST['jenis_kamar'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    // Buat query update
    $query = "UPDATE kamar SET nomor_kamar = '$nomor_kamar', jenis_kamar = '$jenis_kamar', harga = '$harga', status = '$status' WHERE id = '$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result > 0) {
        echo 'Kamar berhasil di ubah';
        header("Location: ../user/manajemen_kamar.php");
    }
}
