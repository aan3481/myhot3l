<?php
require_once('vendor/midtran'); // Sesuaikan path dengan lokasi autoload.php dari Midtrans SDK

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-EJ-kgrr9ZrFnkc8PXVIDodbL';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

// Ambil data dari POST
$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';

if (empty($jumlah)) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Jumlah pembayaran tidak boleh kosong']);
    exit;
}

// Parameter transaksi
$params = array(
    'transaction_details' => array(
        'order_id' => uniqid(), // Gunakan unique order_id, misalnya uniqid() atau generate secara unik sesuai kebutuhan
        'gross_amount' => (int)$jumlah, // Jumlah yang dibayarkan, pastikan diubah menjadi integer jika diperlukan
    ),
);

try {
    // Buat transaksi baru dengan memanggil createTransaction dari SDK Midtrans Snap
    $snapToken = \Midtrans\Snap::createTransaction($params)->redirect_url;

    // Kirim token sebagai respons JSON
    echo json_encode(['token' => $snapToken]);
} catch (Exception $e) {
    // Tangani kesalahan
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
