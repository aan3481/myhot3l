<?php
// fetch_guest_details.php

// Connect to database and fetch guest details
$koneksi = new mysqli("localhost", "username", "password", "nama_database");
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

$id_reservasi = $_POST['id_reservasi'];

// Query untuk mengambil id_reservasi dari tabel reservasi
$query_reservasi = "SELECT id_reservasi FROM reservasi WHERE id_reservasi = ?";
$stmt_reservasi = $koneksi->prepare($query_reservasi);
$stmt_reservasi->bind_param("i", $id_reservasi);
$stmt_reservasi->execute();
$result_reservasi = $stmt_reservasi->get_result();

if ($result_reservasi->num_rows > 0) {
    // Query untuk mengambil data tamu berdasarkan id_reservasi dari tabel tamu
    $query_tamu = "SELECT nama_depan, nama_belakang, email, telepon FROM tamu WHERE id_reservasi = ?";
    $stmt_tamu = $koneksi->prepare($query_tamu);
    $stmt_tamu->bind_param("i", $id_reservasi);
    $stmt_tamu->execute();
    $result_tamu = $stmt_tamu->get_result();

    if ($result_tamu->num_rows > 0) {
        $guestDetails = $result_tamu->fetch_assoc();
        $response = array('status' => 'success', 'data' => $guestDetails);
    } else {
        $response = array('status' => 'error', 'message' => 'Guest details not found');
    }
} else {
    $response = array('status' => 'error', 'message' => 'Reservation not found');
}

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);
exit;
