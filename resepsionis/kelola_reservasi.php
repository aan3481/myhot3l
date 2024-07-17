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

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <h2>Kelola Reservasi</h2>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahReservasiModal">+ Tambah Reservasi</button>
            <?php
            // Inisialisasi variabel reservasi
            $reservasi = null;

            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_reservasi'])) {
                $id_reservasi = $_GET['id_reservasi'];

                // Query untuk mengambil data reservasi
                $query_reservasi = "SELECT r.id, t.nama_depan, t.nama_belakang, t.email, t.telepon, k.nomor_kamar, k.jenis_kamar, k.harga, r.tanggal_checkin, r.tanggal_checkout, r.status 
                      FROM reservasi r 
                      JOIN tamu t ON r.id_tamu = t.id 
                      JOIN kamar k ON r.id_kamar = k.id 
                      WHERE r.id = $id_reservasi";

                $result_reservasi = mysqli_query($koneksi, $query_reservasi);

                if ($result_reservasi && mysqli_num_rows($result_reservasi) > 0) {
                    $reservasi = mysqli_fetch_assoc($result_reservasi);
                } else {
                    // Jika tidak ada data reservasi
                    echo '<div class="alert alert-warning" role="alert">';
                    echo 'Reservasi tidak ditemukan atau data reservasi tidak lengkap.';
                    echo '</div>';
                }
            }

            // Lanjutkan dengan menampilkan tabel reservasi seperti sebelumnya
            $query = "SELECT r.id, t.nama_depan, t.nama_belakang, t.email, t.telepon, k.nomor_kamar, r.tanggal_checkin, r.tanggal_checkout, r.status 
          FROM reservasi r 
          JOIN tamu t ON r.id_tamu = t.id 
          JOIN kamar k ON r.id_kamar = k.id";
            $result = mysqli_query($koneksi, $query);
            ?>
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Reservasi</th>
                        <th>Nama Tamu</th>
                        <th>Nomor Kamar</th>
                        <th>Tanggal Check-in</th>
                        <th>Tanggal Check-out</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $nama_tamu = $row['nama_depan'] . ' ' . $row['nama_belakang'];
                            $id_reservasi = $row['id'];
                            $nomor_kamar = $row['nomor_kamar'];
                            $tanggal_checkin = $row['tanggal_checkin'];
                            $tanggal_checkout = $row['tanggal_checkout'];
                            $status = $row['status'];

                            echo "<tr>
                    <td>{$id_reservasi}</td>
                    <td>{$nama_tamu}</td>
                    <td>{$nomor_kamar}</td>
                    <td>{$tanggal_checkin}</td>
                    <td>{$tanggal_checkout}</td>
                    <td>{$status}</td>
                    <td>
                        <button class='btn btn-warning btn-sm btn-edit' 
                                data-id='{$id_reservasi}' 
                                data-nama_depan='{$row['nama_depan']}' 
                                data-nama_belakang='{$row['nama_belakang']}'
                                data-email='{$row['email']}'
                                data-telepon='{$row['telepon']}' 
                                data-toggle='modal' 
                                data-target='#editModalReservasi'>Edit</button>
                        <button type='button' class='btn btn-danger btn-sm btn-delete' 
                                data-toggle='modal' 
                                data-target='#deleteModal' 
                                data-id='{$id_reservasi}'>
                            Hapus
                        </button>
                        <form action='' method='GET' class='d-block'>
                            <input type='hidden' name='id_reservasi' value='{$id_reservasi}'>
                            <button type='button' class='btn btn-primary btn-sm btn-pembayaran' data-id='{$id_reservasi}'>Pembayaran</button>
                        </form>
                    </td>
                </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $('.btn-pembayaran').on('click', function() {
                        var id_reservasi = $(this).data('id');

                        // AJAX request untuk memeriksa apakah pembayaran sudah dilakukan
                        $.ajax({
                            url: 'cek_pembayaran.php',
                            type: 'GET',
                            data: {
                                id_reservasi: id_reservasi
                            },
                            success: function(response) {
                                if (response === 'sudah_bayar') {
                                    alert('ID Reservasi ini sudah pernah melakukan pembayaran.');
                                } else {
                                    window.location.href = 'pembayaran.php?id_reservasi=' + id_reservasi;
                                }
                            }
                        });
                    });
                });
            </script>




        </div>

        <!-- Tambah Modal -->
        <div class="modal fade" id="tambahReservasiModal" tabindex="-1" role="dialog" aria-labelledby="tambahReservasiModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahReservasiModalLabel">Tambah Reservasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../aksi/tambah_kelola_reservasi.php" method="POST" id="formTambahReservasi">
                            <div class="form-group">
                                <label for="tamu">Pilih Tamu</label>
                                <select class="form-control" id="tamu" name="tamu" required>
                                    <option value="">- Pilih Tamu -</option>
                                    <?php
                                    $query_tamu = "SELECT id, nama_depan, nama_belakang, email, telepon FROM tamu";
                                    $result_tamu = mysqli_query($koneksi, $query_tamu);
                                    while ($row = mysqli_fetch_assoc($result_tamu)) {
                                        $nama_tamu = $row['nama_depan'] . ' ' . $row['nama_belakang'];
                                        echo "<option value='{$row['id']}' 
                            data-nama-depan='{$row['nama_depan']}' 
                            data-nama-belakang='{$row['nama_belakang']}'
                            data-email='{$row['email']}'
                            data-telepon='{$row['telepon']}'>{$nama_tamu}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" class="form-control" id="nama_depan" name="nama_depan" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="nama_belakang">Nama Belakang</label>
                                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor_kamar">Nomor Kamar</label>
                                <select class="form-control" id="nomor_kamar" name="nomor_kamar" required>
                                    <?php
                                    $query_kamar = "SELECT nomor_kamar FROM kamar WHERE status = 'Tersedia'";
                                    $result_kamar = mysqli_query($koneksi, $query_kamar);
                                    while ($row = mysqli_fetch_assoc($result_kamar)) {
                                        echo "<option value='{$row['nomor_kamar']}'>{$row['nomor_kamar']}</option>";
                                    }
                                    ?>
                                </select>
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
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var tamuSelect = document.getElementById('tamu');
                var namaDepanInput = document.getElementById('nama_depan');
                var namaBelakangInput = document.getElementById('nama_belakang');
                var emailInput = document.getElementById('email');
                var teleponInput = document.getElementById('telepon');

                tamuSelect.addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    namaDepanInput.value = selectedOption.dataset.namaDepan || '';
                    namaBelakangInput.value = selectedOption.dataset.namaBelakang || '';
                    emailInput.value = selectedOption.dataset.email || '';
                    teleponInput.value = selectedOption.dataset.telepon || '';
                });
            });
        </script>

        <script>
            // Ambil elemen dropdown tamu
            var tamuSelect = document.getElementById('tamu');

            // Tambahkan event listener untuk event change
            tamuSelect.addEventListener('change', function() {
                // Ambil nilai ID tamu yang dipilih
                var selectedTamuId = this.value;

                // Cari option yang dipilih untuk mendapatkan data tambahan
                var selectedOption = this.options[this.selectedIndex];

                // Ambil data nama depan dan nama belakang dari atribut data
                var namaDepan = selectedOption.getAttribute('data-nama-depan');
                var namaBelakang = selectedOption.getAttribute('data-nama-belakang');

                // Masukkan nilai nama depan dan nama belakang ke dalam input form
                document.getElementById('nama_depan').value = namaDepan;
                document.getElementById('nama_belakang').value = namaBelakang;
            });
        </script>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModalReservasi" tabindex="-1" role="dialog" aria-labelledby="editModalReservasiLabel" aria-hidden="true">
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
        </div>

        <!-- Modal Konfirmasi Hapus Pengguna -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
        </div>

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

            // Auto Logout
            // Fungsi untuk mengatur waktu logout


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