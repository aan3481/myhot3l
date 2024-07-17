<?php

include '../koneksi.php';

$id = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM kamar WHERE id= '$id'");

header("location: ../user/manajemen_kamar.php");
