<?php
include 'koneksi.php';
$showModal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kirim'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);

    // Query untuk menyimpan data ke tabel kontak
    $query = "INSERT INTO kontak (nama, email, komentar) VALUES ('$nama', '$email', '$komentar')";

    if (mysqli_query($koneksi, $query)) {
        $showModal = true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">

    <!-- FOnt awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Pemesanan Tiket</title>
</head>
<style>
    html,
    body {
        width: 100%;
        height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }

    .hero-section {
        position: relative;
        background-image: url('img/hotel.jpeg');
        /* Ganti dengan path atau URL gambar Anda */
        background-size: cover;
        background-position: center;
        height: 100vh;
        /* Menggunakan viewport height untuk mengisi layar penuh */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .text-bus {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        text-shadow: 2px 2px 4px #0d6efd;

        /* Offset-x, offset-y, blur-radius, color */
    }

    /* Navigasi */

    /* Navigasi */
    .navbar {
        padding: 5px;
        transition: background-color 0.3s ease;
        /* Animasi perubahan warna latar belakang */
    }

    .navbar .navbar-nav .nav-link {
        color: white;
        transition: color 0.3s ease;
        /* Animasi perubahan warna teks */
    }

    .navbar .navbar-nav .nav-item {
        font-weight: 600;
        text-shadow: 2px #0d6efd;
    }

    .navbar.bg-primary {
        background-color: #0d6efd !important;
        /* Latar belakang navigasi saat di-scroll */
    }

    .navbar.bg-primary .navbar-nav .nav-link {
        color: white;
        /* Warna teks saat di-scroll */
    }

    /* h2 */
    h,
    .layanan {
        font-weight: 600;
    }

    h,
    .tentang-kami {
        font-weight: 600;
    }

    h,
    .kontak {
        font-weight: 600;
    }

    /* Services */
    .service-icon {
        font-size: 3rem;
        color: #007bff;
        /* Ubah warna ikon sesuai keinginan Anda */
    }

    .service-item {
        padding: 20px;
        border-radius: 8px;
        background-color: #f8f9fa;
        /* Warna latar belakang item layanan */
        height: 100%;
    }

    .service-item h3 {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .service-item p {
        font-size: 1rem;
    }
</style>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class=" nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang-kami">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero-section d-flex align-items-center" style="background-image: url('img/hotel.jpeg'); height: 100vh; background-size: cover; background-position: center;">
        <div class="container text-center">
            <h2 class="text-center text-bus">RESERVASI NEWS HOTEL</h2>
            <a class="btn btn-primary btn-md" href="login.php">Lihat Selengkapnya</a>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang-kami" class="py-5">
        <div class="container">
            <h2 class="text-center tentang-kami">Tentang Kami</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Selamat datang di News Hotel, sebuah tempat di tengah jantung Surabaya yang menawarkan lebih dari sekadar tempat menginap. Terletak dengan strategis di pusat kota, News Hotel menjadi pilihan utama bagi para pelancong yang menghargai kenyamanan dan kemewahan. Dengan koleksi kamar-kamar yang elegan dan pemandangan kota yang menakjubkan, setiap kunjungan dijamin menjadi pengalaman yang tak terlupakan.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Fasilitas modern dan layanan prima menjadi andalan kami, memastikan setiap tamu diperlakukan layaknya seorang raja. Dari momen kedatangan hingga keberangkatan, staf kami siap memberikan pelayanan terbaik untuk memenuhi segala kebutuhan dan keinginan Anda. Whether you're here for business or pleasure, News Hotel offers an experience that blends comfort with convenience, promising a stay that exceeds expectations.</p>
                        </div>
                    </div>
                </div>
            </div>

    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center layanan">Layanan</h2>
            <div class="row text-center">
                <div class="col-lg-4 mb-4">
                    <div class="service-item">
                        <span class="service-icon"><i class="fas fa-bookmark"></i></span>
                        <h3 class="mt-3">Reservasi Sangat Mudah</h3>
                        <p>Reservasi kamar dengan cepat dan mudah melalui platform kami.</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="service-item">
                        <span class="service-icon"><i class="fas fa-bed"></i></span>
                        <h3 class="mt-3">Fasilitas Kamar Lengkap</h3>
                        <p>Kamar dilengkapi dengan WiFi, AC, dll.</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="service-item">
                        <span class="service-icon"><i class="fas fa-clock"></i></span>
                        <h3 class="mt-3">Fleksibilitas Kamar</h3>
                        <p>Fleksibilitas Kamar mulai dari Standard, Suite, sampai Deluxe.</p>
                    </div>
                </div>
            </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-5">
        <div class="container">
            <h2 class="text-center kontak mb-4">Kontak</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="pesanForm">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="Contoh: Farhan Syawal" required>
                            <label for="floatingInput">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="farhan@gmail.com" required>
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="komentar" placeholder="" id="floatingTextarea2" style="height: 100px" required></textarea>
                            <label for="floatingTextarea2">Komentar</label>
                        </div>
                        <button type="submit" name="kirim" class="btn btn-primary mt-3">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Pesan Terkirim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Terima kasih! Pesan Anda telah berhasil dikirim.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if ($showModal) : ?>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            });
        <?php endif; ?>
    </script>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <script>
        // Add background color on scroll
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) { // Set height to which navbar changes
                $('.navbar').addClass('bg-primary');
            } else {
                $('.navbar').removeClass('bg-primary');
            }
        });

        // Smooth scrolling
        $('body').scrollspy({
            target: '.navbar',
            offset: 50
        });

        $('.nav-link').on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {
                    window.location.hash = hash;
                });
            }
        });
    </script>
</body>

</html>