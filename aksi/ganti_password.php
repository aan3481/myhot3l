<?php
session_start();
include('../koneksi.php'); // Sesuaikan dengan path file koneksi database Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $kata_sandi = $_POST['kata_sandi'];
    $kata_sandi_baru = $_POST['kata_sandi_baru'];
    $konfirmasi_kata_sandi_baru = $_POST['konfirmasi_kata_sandi_baru'];

    // Query untuk mencari pengguna berdasarkan id dan password lama
    $query = "SELECT * FROM pengguna WHERE id = '$id' AND kata_sandi = '$kata_sandi'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $data = mysqli_fetch_array($result);

        if ($data) {
            // Pastikan password baru dan konfirmasi password baru sama
            if ($kata_sandi_baru == $konfirmasi_kata_sandi_baru) {
                // Enkripsi password baru
                $pass_ok = $kata_sandi_baru;

                // Update password di database
                $update_query = "UPDATE pengguna SET kata_sandi = '$pass_ok' WHERE id = '$id'";
                $update_result = mysqli_query($koneksi, $update_query);

                if ($update_result) {
                    $_SESSION['status'] = 'success';
                    $_SESSION['message'] = 'Password berhasil diubah, silahkan logout untuk menguji password baru Anda.';
                } else {
                    $_SESSION['status'] = 'error';
                    $_SESSION['message'] = 'Gagal mengubah password. Silahkan coba lagi.';
                }
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['message'] = 'Password baru dan konfirmasi password tidak sama!';
            }
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Password lama tidak sesuai atau tidak terdaftar!';
        }
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Query gagal dieksekusi. Silahkan coba lagi.';
    }

    header("Location: ../user/settings.php");
    exit();
}
