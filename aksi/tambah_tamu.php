<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt = $koneksi->prepare("INSERT INTO tamu (nama_depan, nama_belakang, email, telepon) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama_depan, $nama_belakang, $email, $telepon);

    // Jalankan query dan periksa hasilnya
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Data tamu berhasil ditambahkan';
        echo '</div>';
        header("Location: ../resepsionis/kelola_tamu.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi database
    $stmt->close();
    $koneksi->close();
}
