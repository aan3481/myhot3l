<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_reservasi = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nama_depan = filter_input(INPUT_POST, 'nama_depan', FILTER_SANITIZE_STRING);
    $nama_belakang = filter_input(INPUT_POST, 'nama_belakang', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telepon = filter_input(INPUT_POST, 'telepon', FILTER_SANITIZE_STRING);

    $query = "UPDATE tamu t
          JOIN reservasi r ON t.id = r.id_tamu
          SET t.nama_depan = ?, t.nama_belakang = ?, t.email = ?, t.telepon = ?
          WHERE r.id = ?";

    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama_depan, $nama_belakang, $email, $telepon, $id_reservasi);

    if (mysqli_stmt_execute($stmt)) {
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if ($affected_rows > 0) {
            $_SESSION['success_message'] = "Data tamu berhasil diperbarui.";
            header("Location: ../resepsionis/kelola_reservasi.php");
        } else {
            $_SESSION['warning_message'] = "Tidak ada perubahan data.";
        }
    } else {
        $_SESSION['error_message'] = "Error: " . mysqli_stmt_error($stmt);
    }
}
