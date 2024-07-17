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
            <h2>Kelola Tamu</h2>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahKelolaTamu">+ Tambah Tamu</button>
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM tamu");
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nama_depan'] ?></td>
                            <td><?php echo $row['nama_belakang'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['telepon'] ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm edit-btn" data-toggle="modal" data-target="#editKelolaTamu" data-id="<?php echo $row['id']; ?>" data-nama_depan="<?php echo $row['nama_depan']; ?>" data-nama_belakang="<?php echo $row['nama_belakang']; ?>" data-email="<?php echo $row['email']; ?>" data-telepon="<?php echo $row['telepon']; ?>">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $row['id']; ?>">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
        <!-- Tambah Modal -->
        <div class="modal fade" id="tambahKelolaTamu" tabindex="-1" role="dialog" aria-labelledby="tambahKelolaTamuLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahKelolaTamuLabel">Tambah Tamu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../aksi/tambah_tamu.php" method="POST">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editKelolaTamu" tabindex="-1" role="dialog" aria-labelledby="editKelolaTamuLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKelolaTamuLabel">Edit Tamu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../aksi/edit_kelola_tamu.php" method="POST" id="editForm">
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
                    <form id="deleteForm" action="../hapus/hapus_kelola_tamu.php" method="POST">
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
                // Event delegation untuk tombol edit
                $(document).on('click', '.edit-btn', function() {
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
                    $('#editKelolaTamu').modal('show');
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
</body>

</html>