<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_tamu = $_POST['tamu'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $nomor_kamar = $_POST['nomor_kamar'];
    $tanggal_checkin = $_POST['tanggal_checkin'];
    $tanggal_checkout = $_POST['tanggal_checkout'];
    $status = $_POST['status'];

    // Validasi nomor kamar
    if (empty($nomor_kamar)) {
        echo "Nomor kamar tidak boleh kosong";
        exit; // Hentikan eksekusi jika nomor kamar kosong
    }

    // Get the id of the room
    $query_kamar = "SELECT id FROM kamar WHERE nomor_kamar = ?";
    $stmt_kamar = mysqli_prepare($koneksi, $query_kamar);
    mysqli_stmt_bind_param($stmt_kamar, "s", $nomor_kamar);
    mysqli_stmt_execute($stmt_kamar);
    mysqli_stmt_bind_result($stmt_kamar, $id_kamar);
    mysqli_stmt_fetch($stmt_kamar);
    mysqli_stmt_close($stmt_kamar);

    // Pastikan id_kamar tidak null
    if (!$id_kamar) {
        echo "Nomor kamar tidak ditemukan";
        exit; // Hentikan eksekusi jika id_kamar null
    }

    // Insert data into reservasi table
    $query_reservasi = "INSERT INTO reservasi (id_tamu, id_kamar, tanggal_checkin, tanggal_checkout, status) 
                        VALUES (?, ?, ?, ?, ?)";
    $stmt_reservasi = mysqli_prepare($koneksi, $query_reservasi);
    mysqli_stmt_bind_param($stmt_reservasi, "iisss", $id_tamu, $id_kamar, $tanggal_checkin, $tanggal_checkout, $status);

    if (mysqli_stmt_execute($stmt_reservasi)) {
        echo "Reservasi berhasil disimpan";
        header("Location: ../resepsionis/kelola_reservasi.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt_reservasi);
    mysqli_close($koneksi);
}
