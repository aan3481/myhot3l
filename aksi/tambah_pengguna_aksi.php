<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_pengguna = $_POST['nama_pengguna'];
    $email = $_POST['email'];
    $peran = $_POST['peran'];

    // Contoh kata sandi default
    $kata_sandi = ''; // Sesuaikan dengan logika keamanan yang sesuai di aplikasi Anda

    // Query SQL untuk melakukan INSERT
    $sql = "INSERT INTO pengguna (nama_pengguna, kata_sandi, email, peran) 
        VALUES ('$nama_pengguna', '$kata_sandi', '$email', '$peran')";

    // Jalankan query dan periksa hasilnya
    if (mysqli_query($koneksi, $sql)) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Data pengguna berhasil ditambahkan';
        echo '</div>';
        header("Location: ../user/manajemen_pengguna.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
