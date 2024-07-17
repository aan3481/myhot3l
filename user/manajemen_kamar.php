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
            <h1>Manajemen Kamar</h1>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahKamar">+ Tambah Kamar</button>
            <?php
            $sql = "SELECT * FROM kamar";
            $result = mysqli_query($koneksi, $sql);
            ?>
            <table id="example" class="table table-striped text-left">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nomor Kamar</th>
                        <th>Jenis Kamar</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nomor_kamar']; ?></td>
                            <td><?php echo $row['jenis_kamar']; ?></td>
                            <td><?php echo $row['harga']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="<?php echo $row['id']; ?>" data-nomor_kamar="<?php echo $row['nomor_kamar']; ?>" data-jenis_kamar="<?php echo $row['jenis_kamar']; ?>" data-harga="<?php echo $row['harga']; ?>" data-status="<?php echo $row['status']; ?>">
                                    Edit
                                </button>
                                <!-- Hapus pengguna dengan konfirmasi -->
                                <!-- Button Hapus dengan data-target sesuai dengan id unik -->
                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $row['id']; ?>">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <th>ID</th>
                    <th>Nomor Kamar</th>
                    <th>Jenis Kamar</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tfoot>
            </table>
        </div>

        <!-- Modal Tambah Pengguna -->
        <div class="modal fade" id="modalTambahKamar" tabindex="-1" aria-labelledby="modalTambahPenggunaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahPenggunaLabel">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../aksi/tambah_kamar_aksi.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nomor_kamar">Nomor Kamar</label>
                                <input type="number" value="<?php echo rand(1, 199) ?>" class="form-control" id="nomor_kamar" name="nomor_kamar" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kamar">Jenis Kamar</label>
                                <input class="form-control" list="datalistJenisKamar" id="jenis_kamar" name="jenis_kamar" placeholder="Klik untuk mencari" onchange="updateHarga()">
                                <datalist id="datalistJenisKamar">
                                    <option value="Standard">
                                    <option value="Suite">
                                    <option value="Deluxe">
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input class="form-control" list="datalistStatus" id="status" name="status" placeholder="Klik untuk mencari">
                                <datalist id="datalistStatus">
                                    <option value="Tersedia">
                                    <option value="Terisi">
                                    <option value="Perawatan">
                                </datalist>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Pengguna -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="editForm" action="../aksi/edit_manajemen_kamar_aksi.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Kamar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="edit-id" name="id">
                                <label for="edit-nama" class="col-form-label">Nomor Kamar:</label>
                                <input type="text" class="form-control" id="edit-nomor_kamar" name="nomor_kamar" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-jenis_kamar" class="col-form-label">Jenis Kamar:</label>
                                <select class="form-control" id="edit-jenis_kamar" name="jenis_kamar" required>
                                    <option value="Standard">Standard</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Deluxe">Deluxe</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit-harga" class="col-form-label">Harga:</label>
                                <input type="number" class="form-control" id="edit-harga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-status" class="col-form-label">Status Kamar:</label>
                                <select class="form-control" id="edit-status" name="status" required>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Terisi">Terisi</option>
                                    <option value="Perawatan">Perawatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Konfirmasi Hapus Pengguna -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="deleteForm" action="../hapus/hapus_kamar.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus kamar ini?</p>
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


</body>



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

<script>
    function updateHarga() {
        var jenisKamar = document.getElementById("jenis_kamar").value;
        var hargaInput = document.getElementById("harga");

        switch (jenisKamar) {
            case "Standard":
                hargaInput.value = "500000";
                break;
            case "Suite":
                hargaInput.value = "1000000";
                break;
            case "Deluxe":
                hargaInput.value = "1500000";
                break;
            default:
                hargaInput.value = ""; // Jika pilihan tidak cocok, kosongkan harga
                break;
        }
    }

    const hargaJenisKamar = {
        "Standard": 500000,
        "Suite": 1000000,
        "Deluxe": 1500000
    };

    // Ketika jenis kamar diubah
    $('#edit-jenis_kamar').change(function() {
        var selectedJenisKamar = $(this).val();
        var newHarga = hargaJenisKamar[selectedJenisKamar];
        $('#edit-harga').val(newHarga);
    });
</script>




</html>