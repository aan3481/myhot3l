<?php
session_start();
include '../koneksi.php';

$id = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM reservasi WHERE id = '$id' ");

header("location: ../resepsionis/kelola_reservasi.php");
