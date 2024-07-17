<?php

session_start();
include '../koneksi.php';

if (isset($_GET['id_reservasi'])) {
    $id_reservasi = intval($_GET['id_reservasi']);

    // Periksa apakah ID reservasi sudah pernah melakukan pembayaran
    $query_cek_pembayaran = "SELECT COUNT(*) as count FROM pembayaran WHERE id_reservasi = $id_reservasi";
    $result = mysqli_query($koneksi, $query_cek_pembayaran);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        echo 'sudah_bayar';
    } else {
        echo 'belum_bayar';
    }
}
