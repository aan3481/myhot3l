<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['is_login']) || !isset($_SESSION['email'])) {
    header("location: ../login-tamu.php");
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
                    <a class="nav-link text-white " href="reservasi.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">man</i>
                        </div>

                        <span class="nav-link-text ms-1">Reservasi Saya</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="profile.php">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">settings</i>
                        </div>

                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="../logout-tamu.php">
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
            <h6>Selamat datang, <?php echo htmlspecialchars($_SESSION['nama_depan']);  ?>!</h6>
            <h2>Settings</h2>
            <?php
            // Dapatkan informasi pengguna dari database berdasarkan email
            $email = $_SESSION['email'];
            $query = "SELECT * FROM tamu WHERE email = ?";
            $stmt = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                $tamu = mysqli_fetch_assoc($result);
            } else {
                // Jika tidak ada data pengguna yang cocok dengan email yang ada di sesi, redirect ke halaman login
                header("location: ../login-tamu.php");
                exit;
            }

            mysqli_stmt_close($stmt);
            mysqli_close($koneksi);
            // Periksa apakah data pengguna ditemukan
            ?>
            <style>
                .profile-photo {
                    width: 150px;
                    height: 150px;
                    object-fit: cover;
                }
            </style>
            <div class="container mt-5">
                <div class="row">
                    <!-- User Information Card -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Profil Tamu</h3>
                                <form id="updateProfileForm" action="../aksi/profile_update.php" method="POST">
                                    <div class="form-group">
                                        <label for="nama_depan" class="col-form-label">Nama Depan:</label>
                                        <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?php echo htmlspecialchars($tamu['nama_depan']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_belakang" class="col-form-label">Nama Belakang:</label>
                                        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?php echo htmlspecialchars($tamu['nama_belakang']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($tamu['email']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon" class="col-form-label">Telepon:</label>
                                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo htmlspecialchars($tamu['telepon']); ?>" required>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $tamu['id']; ?>">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Profile Image Card -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3 class="card-title">Foto Profil</h3>
                                <?php if (!empty($tamu['foto'])) { ?>
                                    <img src="<?php echo htmlspecialchars($tamu['foto']); ?>" alt="Profile Photo" class="img-fluid rounded-circle mb-3 profile-photo">
                                    <form id="updatePhotoForm" action="../aksi/photo_update.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="foto" class="col-form-label">Ubah Foto Profil:</label>
                                            <input type="file" class="form-control" id="foto" name="foto">
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $tamu['id']; ?>">
                                        <button type="submit" class="btn btn-primary">Ubah Foto</button>
                                    </form>
                                <?php } else { ?>
                                    <img src="../path/to/default-avatar.png" alt="Default Avatar" class="img-fluid rounded-circle mb-3 profile-photo">
                                    <form id="updatePhotoForm" action="../aksi/photo_update.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="foto" class="col-form-label">Unggah Foto Profil:</label>
                                            <input type="file" class="form-control" id="foto" name="foto">
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $tamu['id']; ?>">
                                        <button type="submit" class="btn btn-primary">Unggah Foto</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
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
<?php
ob_end_flush(); // Hentikan output buffering dan kirim semua output
?>