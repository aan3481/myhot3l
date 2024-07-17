<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nomor_kamar = $_POST['nomor_kamar'];
    $jenis_kamar = $_POST['jenis_kamar'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    // Contoh kata sandi default // Sesuaikan dengan logika keamanan yang sesuai di aplikasi Anda

    // Query SQL untuk melakukan INSERT
    $sql = "INSERT INTO kamar (nomor_kamar, jenis_kamar, harga, status) 
        VALUES ('$nomor_kamar', '$jenis_kamar', '$harga', '$status')";

    // Jalankan query dan periksa hasilnya
    if (mysqli_query($koneksi, $sql)) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Kamar baru berhasil ditambahkan';
        echo '</div>';
        header("Location: ../user/manajemen_kamar.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
