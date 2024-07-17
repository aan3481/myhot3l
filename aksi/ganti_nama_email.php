<?php
include '../koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST['id'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $email = $_POST['email'];

    $sql = "UPDATE pengguna SET nama_pengguna='$nama_pengguna', email='$email' WHERE id='$id'";

    if ($koneksi->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully';
        echo '</div>';
        header("location: ../user/settings.php");
    } else {
        echo "Error updating record: " . $koneksi->error;
    }

    $koneksi->close();
}
