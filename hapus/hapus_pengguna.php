<?php
session_start();
include '../koneksi.php';

$id = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM pengguna WHERE id= '$id'");

header("location: ../user/manajemen_pengguna.php");
