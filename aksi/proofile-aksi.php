<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $sql = "UPDATE tamu SET nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', email = '$email', telepon = '$telepon' WHERE id = '$id'";

    if ($koneksi->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Data berhasil diubah';
        echo '</div>';
        header("location: ../tamu/profile.php");
    } else {
        echo "Error updating record: " . $koneksi->error;
    }

    $koneksi->close();
}
