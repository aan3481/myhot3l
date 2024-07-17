<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['is_login'])) {
    header("location: ../login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>NewsHOTEL</title>

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-uuGGr7MMdVjoU1HG"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>


<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">NewsHOTEL</span>
            </a>
        </div>


        <hr class="horizontal light mt-0 mb-2">

        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav font-3">
                <li class="nav-item">
                    <a class="nav-link text-white " href="../resepsionis/index.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>

                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="kelola_reservasi.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">room</i>
                        </div>

                        <span class="nav-link-text ms-1">Kelola Reservasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="kelola_tamu.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">man</i>
                        </div>

                        <span class="nav-link-text ms-1">Kelola Tamu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="pembayaran.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">money</i>
                        </div>

                        <span class="nav-link-text ms-1">Pembayaran</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="../logout.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">settings</i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main-content border-radius-lg ">
        <!-- Navbar -->

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">index</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">index</h6>

                </nav>
        </nav>
        <div class="container-fluid py-4">
            <?php
            // Pastikan ini adalah baris pertama file, tanpa spasi atau baris kosong sebelumnya
            ob_start(); // Mulai output buffering

            // Pastikan koneksi ke database sudah dibuat
            // Misalnya: $koneksi = mysqli_connect("localhost", "username", "password", "nama_database");

            // Inisialisasi variabel
            // Inisialisasi variabel
            $errors = [];
            $id_reservasi = 0;
            $nama_tamu = '';
            $nomor_kamar = '';
            $tanggal_checkin = '';
            $tanggal_checkout = '';
            $status = '';
            $total_harga = 0;

            // Fungsi untuk memvalidasi status
            function validateStatus($status)
            {
                $valid_statuses = ['menunggu', 'selesai', 'gagal'];
                return in_array($status, $valid_statuses) ? $status : 'selesai';
            }

            // Periksa jika ada id reservasi yang diberikan melalui GET
            if (isset($_GET['id_reservasi']) && !empty($_GET['id_reservasi'])) {
                $id_reservasi = intval($_GET['id_reservasi']);

                // Lakukan escape terhadap id_reservasi
                $id_reservasi = mysqli_real_escape_string($koneksi, $id_reservasi);

                // Query untuk mengambil data reservasi yang sesuai dengan id_reservasi
                $query_reservasi = "SELECT r.id, t.nama_depan, t.nama_belakang, k.nomor_kamar, k.harga, r.tanggal_checkin, r.tanggal_checkout, r.status 
                        FROM reservasi r 
                        JOIN tamu t ON r.id_tamu = t.id 
                        JOIN kamar k ON r.id_kamar = k.id 
                        WHERE r.id = $id_reservasi";

                $result_reservasi = mysqli_query($koneksi, $query_reservasi);

                if ($result_reservasi && mysqli_num_rows($result_reservasi) > 0) {
                    $reservasi = mysqli_fetch_assoc($result_reservasi);
                    $nama_tamu = $reservasi['nama_depan'] . ' ' . $reservasi['nama_belakang'];
                    $nomor_kamar = $reservasi['nomor_kamar'];
                    $harga_per_malam = $reservasi['harga'];
                    $tanggal_checkin = $reservasi['tanggal_checkin'];
                    $tanggal_checkout = $reservasi['tanggal_checkout'];
                    $status = $reservasi['status'];

                    // Hitung total harga berdasarkan durasi menginap
                    $tanggal_checkin_obj = new DateTime($tanggal_checkin);
                    $tanggal_checkout_obj = new DateTime($tanggal_checkout);
                    $durasi = $tanggal_checkin_obj->diff($tanggal_checkout_obj)->days;
                    $total_harga = $durasi * $harga_per_malam;
                } else {
                    $errors[] = 'Reservasi tidak ditemukan atau data reservasi tidak lengkap.';
                }
            }

            // Proses pembayaran jika form telah disubmit
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_pembayaran'])) {
                $errors = [];
                $id_reservasi = isset($_POST['id_reservasi']) ? intval($_POST['id_reservasi']) : 0;
                $metode_pembayaran = $_POST['metode_pembayaran'] ?? '';
                $jumlah = $_POST['jumlah'] ?? '';
                $status = $_POST['status'] ?? '';
                $status = validateStatus($status);

                // Validasi input
                if ($id_reservasi == 0) {
                    $errors[] = 'ID Reservasi tidak tersedia untuk proses pembayaran.';
                }
                if (!in_array($metode_pembayaran, ['Tunai', 'Bank', 'Kartu Kredit', 'Uang Digital'])) {
                    $errors[] = 'Metode pembayaran tidak valid.';
                }
                if (!is_numeric($jumlah) || $jumlah <= 0) {
                    $errors[] = 'Jumlah pembayaran harus berupa angka positif.';
                }

                // Periksa apakah ID reservasi sudah pernah melakukan pembayaran
                $query_cek_pembayaran = "SELECT COUNT(*) as count FROM pembayaran WHERE id_reservasi = ?";
                $stmt_cek = mysqli_prepare($koneksi, $query_cek_pembayaran);
                mysqli_stmt_bind_param($stmt_cek, "i", $id_reservasi);
                mysqli_stmt_execute($stmt_cek);
                mysqli_stmt_bind_result($stmt_cek, $count);
                mysqli_stmt_fetch($stmt_cek);
                mysqli_stmt_close($stmt_cek);

                if ($count > 0) {
                    $errors[] = 'ID Reservasi ini sudah pernah melakukan pembayaran.';
                }

                // Validasi dan simpan data pembayaran ke dalam database jika tidak ada kesalahan
                if (empty($errors)) {
                    $query_insert_pembayaran = "INSERT INTO pembayaran (id_reservasi, jumlah, metode_pembayaran, status) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_prepare($koneksi, $query_insert_pembayaran);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "idss", $id_reservasi, $jumlah, $metode_pembayaran, $status);
                        $result_insert_pembayaran = mysqli_stmt_execute($stmt);

                        if ($result_insert_pembayaran) {
                            // Simpan pesan sukses dalam session dan redirect menggunakan JavaScript
                            $_SESSION['success_message'] = 'Pembayaran berhasil dilakukan.';
                            echo "<script>
                        window.location.href = 'pembayaran.php?success=1';
                      </script>";
                            exit(); // Pastikan untuk keluar setelah redirect
                        } else {
                            $errors[] = 'Gagal memproses pembayaran: ' . mysqli_error($koneksi);
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        $errors[] = 'Gagal mempersiapkan query pembayaran: ' . mysqli_error($koneksi);
                    }
                }

                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    echo "<script>
                window.location.href = 'pembayaran.php';
              </script>";
                    exit();
                }
            }

            // Ambil pesan sukses dari session jika ada
            $success_message = '';
            if (isset($_SESSION['success_message'])) {
                $success_message = $_SESSION['success_message'];
                unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
            }

            // Ambil pesan kesalahan dari session jika ada
            $errors = [];
            if (isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                unset($_SESSION['errors']); // Hapus pesan setelah ditampilkan
            }

            // Ambil riwayat pembayaran
            $query_riwayat = "SELECT p.id, p.id_reservasi, p.jumlah, p.metode_pembayaran, p.status, r.tanggal_checkin, r.tanggal_checkout
                  FROM pembayaran p
                  JOIN reservasi r ON p.id_reservasi = r.id
                  ORDER BY p.id DESC";
            $result_riwayat = mysqli_query($koneksi, $query_riwayat);
            ?>
            <h1 class="mb-4">Pembayaran</h1>

            <?php if ($success_message) : ?>
                <div class="alert alert-success">
                    <?php echo $success_message; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Detail Reservasi -->
            <?php if ($id_reservasi) : ?>
                <div class="card mb-4">
                    <div class="card-header">
                        Detail Reservasi
                    </div>
                    <div class="card-body">
                        <p><strong>Nama Tamu:</strong> <?php echo $nama_tamu; ?></p>
                        <p><strong>Nomor Kamar:</strong> <?php echo $nomor_kamar; ?></p>
                        <p><strong>Tanggal Check-in:</strong> <?php echo $tanggal_checkin; ?></p>
                        <p><strong>Tanggal Check-out:</strong> <?php echo $tanggal_checkout; ?></p>
                        <p><strong>Total Harga:</strong> <?php echo $total_harga; ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Form Pembayaran -->
            <form id="payment-form" method="POST" action="">
                <div class="form-group">
                    <input type="hidden" name="id_reservasi" value="<?php echo $id_reservasi; ?>">
                </div>
                <div class="form-group">
                    <label for="metode_pembayaran">Metode Pembayaran:</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                        <option value="Tunai">Tunai</option>
                        <option value="Bank">Bank</option>
                        <option value="Kartu Kredit">Kartu Kredit</option>
                        <option value="Uang Digital">Uang Digital</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="hidden" name="id_reservasi" value="<?php echo $id_reservasi; ?>">
                    <input type="text" name="jumlah" id="jumlah" class="form-control">
                </div>
                <button type="submit" name="submit_pembayaran" class="btn btn-primary">Proses Pembayaran</button>
            </form>


            <!-- Riwayat Pembayaran -->
            <h2 class="mt-5">Riwayat Pembayaran</h2>
            <table id="example" class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID Pembayaran</th>
                        <th>ID Reservasi</th>
                        <th>Jumlah</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal Check-in</th>
                        <th>Tanggal Check-out</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_riwayat)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['id_reservasi']; ?></td>
                            <td><?php echo $row['jumlah']; ?></td>
                            <td><?php echo $row['metode_pembayaran']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['tanggal_checkin']; ?></td>
                            <td><?php echo $row['tanggal_checkout']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Tambah Modal -->
            <!-- <div class="modal fade" id="tambahReservasiModal" tabindex="-1" role="dialog" aria-labelledby="tambahReservasiModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahReservasiModalLabel">Tambah Reservasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../aksi/tambah_kelola_reservasi.php" method="POST">
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                                </div>
                                
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_checkin">Tanggal Check-in</label>
                                    <input type="date" class="form-control" id="tanggal_checkin" name="tanggal_checkin" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_checkout">Tanggal Check-out</label>
                                    <input type="date" class="form-control" id="tanggal_checkout" name="tanggal_checkout" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input class="form-control" list="datalistStatus" id="status" name="status" placeholder="Klik untuk mencari" required>
                                    <datalist id="datalistStatus">
                                        <option value="Dipesan">
                                        <option value="Checkin">
                                        <option value="Checkout">
                                        <option value="Dibatalkan">
                                    </datalist>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Edit Modal -->
            <!-- <div class="modal fade" id="editModalReservasi" tabindex="-1" role="dialog" aria-labelledby="editModalReservasiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalReservasiLabel">Edit Tamu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../aksi/edit_kelola_reservasi.php" method="POST" id="editForm">
                                <div class="form-group">
                                    <input type="hidden" id="edit-id" name="id">
                                    <label for="edit-nama_depan">Nama Depan</label>
                                    <input type="text" class="form-control" id="edit-nama_depan" name="nama_depan" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-nama_belakang">Nama Belakang</label>
                                    <input type="text" class="form-control" id="edit-nama_belakang" name="nama_belakang" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-email">Email</label>
                                    <input type="email" class="form-control" id="edit-email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-telepon">Telepon</label>
                                    <input type="text" class="form-control" id="edit-telepon" name="telepon" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Modal Konfirmasi Hapus Pengguna -->
            <!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="deleteForm" action="../hapus/hapus_kelola_reservasi.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                                <input type="hidden" id="delete-id" name="id" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->

            <footer class="footer py-4">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.instagram.com/@farhansawal22_" class="font-weight-bold" target="_blank">Farhan Syawal</a>
                                for a better web.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>

    <script src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#example');
    </script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="modal"]').click(function() {
                var targetModal = $(this).data('target');
                $(targetModal).modal('show');
            });

            $(document).ready(function() {
                $('.btn-edit').on('click', function() {
                    var id = $(this).data('id');
                    $('#edit-id').val(id);
                    var nama_depan = $(this).data('nama_depan');
                    var nama_belakang = $(this).data('nama_belakang');
                    var email = $(this).data('email');
                    var telepon = $(this).data('telepon');

                    // Isi form modal dengan data yang diambil
                    $('#edit-id').val(id);
                    $('#edit-nama_depan').val(nama_depan);
                    $('#edit-nama_belakang').val(nama_belakang);
                    $('#edit-email').val(email);
                    $('#edit-telepon').val(telepon);

                    // Tampilkan modal
                    $('#editModalReservasi').modal('show');
                });
            });

            $('.btn-delete').click(function() {
                // Ambil data dari atribut data-* tombol Hapus yang diklik
                var id = $(this).data('id');

                // Isi nilai-nilai form modal dengan data yang diperoleh
                $('#delete-id').val(id);

                // Tampilkan modal
                $('#deleteModal').modal('show');
            });

        });
    </script>

    <script>
        // Fungsi untuk menghilangkan alert setelah 5 detik
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
    <script>
        function setupAutoLogout() {
            let timeout; // variabel untuk menyimpan ID timeout

            // Fungsi untuk me-reset timeout
            function resetTimeout() {
                clearTimeout(timeout); // Hapus timeout yang ada sebelumnya
                timeout = setTimeout(logout, 600000); // Set timeout baru untuk 10 menit (60000 ms)
            }

            // Fungsi untuk logout
            function logout() {
                // Lakukan logout atau redirect ke halaman login
                window.location.href = "../login.php"; // Ganti dengan halaman login Anda
            }

            // Panggil fungsi resetTimeout saat ada aktivitas
            document.addEventListener("mousemove", resetTimeout); // Contoh: reset timeout saat mouse bergerak
            document.addEventListener("keydown", resetTimeout); // Contoh: reset timeout saat tombol keyboard ditekan

            // Set timeout pertama kali saat halaman dimuat
            resetTimeout();
        }

        // Panggil fungsi setupAutoLogout saat halaman dimuat
        document.addEventListener("DOMContentLoaded", setupAutoLogout);
    </script>









    <!-- jQuery -->



</body>

<script>
    $(document).ready(function() {
        $('#editModalReservasi').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);

            var id = button.data('id');
            var nama_depan = button.data('nama_depan');
            var nama_belakang = button.data('nama_belakang');
            var email = button.data('email');
            var telepon = button.data('telepon');

            // Debugging: console log to check values
            console.log("ID: ", id);
            console.log("Nama Depan: ", nama_depan);
            console.log("Nama Belakang: ", nama_belakang);
            console.log("Email: ", email);
            console.log("Telepon: ", telepon);

            var modal = $(this);
            modal.find('#edit-id').val(id);
            modal.find('#edit-nama_depan').val(nama_depan);
            modal.find('#edit-nama_belakang').val(nama_belakang);
            modal.find('#edit-email').val(email);
            modal.find('#edit-telepon').val(telepon);
        });
    });
</script>



</html>