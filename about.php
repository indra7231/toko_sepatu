<?php 
session_start();
require 'config/connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shoes Shop</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Shoes Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) : ?>
                            <a class="nav-link" href="cart.php"><i class="fas fa-fw fa-shopping-cart"></i>
                            Cart</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <ul class="navbar-nav ml-auto ml-md-0">

                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) : ?>
                                        <p class="dropdown-item"><?php echo $_SESSION["nama_user"]; ?></p>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                    <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) : ?>
                                        <a class="dropdown-item" href="updateProfil.php">Update Profil</a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                    <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) : ?>
                                        <a class="dropdown-item" href="orders.php">Orders</a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="login.php">Login</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <div class="container mb-3 mt-3">
            <h4>Selamat datang di Proyek PHP Shoes Shop!</h4><br>
            <p>
                Kami bertujuan untuk menawarkan berbagai sepatu-sepatu terbaru kepada pelanggan kami. Kami telah menempuh perjalanan panjang, jadi kami tahu persis arah mana yang harus diambil saat menyediakan produk berkualitas tinggi namun ramah anggaran. Kami menawarkan semua ini sambil memberikan layanan pelanggan yang sangat baik dan dukungan yang ramah.
            </p><br>
            <p>
            Kami selalu mengikuti tren terbaru di produk-produk kami dan mengutamakan keinginan pelanggan kami. Itulah mengapa kami memiliki pelanggan yang puas di seluruh Indonesia. Kepentingan pelanggan kami selalu menjadi prioritas utama bagi kami, jadi kami berharap Anda akan menikmati produk kami seperti kami senang menyediakannya untuk Anda.
            </p><br>
            <p>
            Kami memastikan Anda mendapatkan sepatu dengan kualitas terbaik dengan kebijakan pengembalian dan penukaran yang bebas repot. Kami memastikan apa yang Anda lihat adalah apa yang Anda dapatkan!.
            </p>
            <ul>
                <li>Jaminan Harga Murah</li>
                <li>Dukungan Pelanggan 24/7</li>
                <li>E-Mail - SMS - Panggilan</li>
                <li>Kami di sini untuk Anda 24/7 online dan melalui telepon.</li>
                <li>Pengiriman Seluruh Indonesia</li>
                <li>Kami ingin segera mengembangkan bisnis kami secara internasional</li>
                <li>Pengembalian Mudah</li>
            </ul>
            <p>
                Membeli sepatu tetapi ingin mengembalikannya? Kami memiliki kebijakan pengembalian mudah 3 hari. Silakan kirim email kepada kami di support@shoesshopphp.com untuk detail lebih lanjut.
            </p>
        </div>

     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Shoes Shop <?php echo date('Y') ?></p>
        </div>
    </footer>

    
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/sb-admin.min.js"></script>
    <script src="assets/js/demo/chart-area-demo.js"></script>

</body>

</html>