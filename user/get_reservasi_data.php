<?php
include '../koneksi.php';

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT MONTH(tanggal_checkin) as bulan, COUNT(*) as jumlah FROM reservasi WHERE status = 'dipesan' GROUP BY MONTH(tanggal_checkin)";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Error dalam query: " . mysqli_error($koneksi));
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
