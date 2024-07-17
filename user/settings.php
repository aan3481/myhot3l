<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['is_login'])) {
    header("location: login.php");
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

    <!-- Jquery -->
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">


    <title>NewsHOTEL</title>





    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->



    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />





    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


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
                    <a class="nav-link text-white " href="index.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>

                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="manajemen_pengguna.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">man</i>
                        </div>

                        <span class="nav-link-text ms-1">Manajemen Pengguna</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="manajemen_kamar.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">house</i>
                        </div>

                        <span class="nav-link-text ms-1">Manajemen Kamar</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="laporan_reservasi.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">room</i>
                        </div>

                        <span class="nav-link-text ms-1">Laporan Reservasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="settings.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">settings</i>
                        </div>

                        <span class="nav-link-text ms-1">Settings</span>
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
            <h2>Settings</h2>
            <?php
            $sql = "SELECT * FROM pengguna";
            $result = mysqli_query($koneksi, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    Ubah Nama dan Email
                </div>
                <div class="card-body">
                    <form id="updateNameEmailForm" action="../aksi/ganti_nama_email.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <label for="nama_pengguna" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama_pengguna" value="<?php echo $row['nama_pengguna'] ?>" name="nama_pengguna" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    Ubah Password
                </div>
                <?php
                if (isset($_SESSION['status']) && isset($_SESSION['message'])) : ?>
                    <div class="alert alert-<?php echo $_SESSION['status'] === 'success' ? 'success' : 'danger'; ?>" role="alert">
                        <?php echo htmlspecialchars($_SESSION['message']); ?>
                    </div>
                <?php
                    // Hapus pesan setelah ditampilkan
                    unset($_SESSION['status']);
                    unset($_SESSION['message']);
                endif; ?>
                <div class="card-body">

                    <form id="updatePasswordForm" action="../aksi/ganti_password.php" method="POST">
                        <div class="form-group">
                            <label for="current-password" class="col-form-label">Password Lama:</label>
                            <input type="password" class="form-control" id="current-password" name="kata_sandi" required>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="new-password" class="col-form-label">Password Baru:</label>
                            <input type="password" class="form-control" id="new-password" name="kata_sandi_baru" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-new-password" class="col-form-label">Konfirmasi Password Baru:</label>
                            <input type="password" class="form-control" id="confirm-new-password" name="konfirmasi_kata_sandi_baru" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </form>
                </div>
            </div>

        </div>

        <!-- Footer -->
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
                            version 1.0
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
        $(document).ready(function() {
            $('#editModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var nomor_kamar = button.data('nomor_kamar');
                var jenis_kamar = button.data('jenis_kamar');
                var harga = button.data('harga');
                var status = button.data('status');

                var modal = $(this);
                modal.find('#edit-id').val(id);
                modal.find('#edit-nomor_kamar').val(nomor_kamar);
                modal.find('#edit-jenis_kamar').val(jenis_kamar);
                modal.find('#edit-harga').val(harga);
                modal.find('#edit-status').val(status);
            });

            // Event ketika tombol Hapus diklik
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
        $(document).ready(function() {
            $('#settings-link').click(function() {
                $('#settingsModal').modal('show');
            });
        });
    </script>


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

<script>
    // Fungsi untuk menghilangkan alert setelah 5 detik
    setTimeout(function() {
        $('.alert').alert('close');
    }, 5000);
</script>



<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Data Tables -->

<script src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('#example');
</script>



</html>