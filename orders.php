<?php 
session_start();
require 'config/connect.php';

if( !isset($_SESSION["nama_user"]) && !isset($_SESSION["id_user"])) {
    header("Location: login.php");
}

$purchases = query("SELECT * FROM `order` WHERE id_user = '$_SESSION[id_user]'");
// var_dump($purchases); die;

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Orders</title>
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="assets/css/sb-admin.css" rel="stylesheet">

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
                        <a class="nav-link" href="about.php">About</a>
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
                        <!-- <a class="nav-link" href="index.html">Dashboard</a> -->
                        <ul class="navbar-nav ml-auto ml-md-0">

                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) : ?>
                                        <p class="dropdown-item"><?php echo $_SESSION["nama_user"]; ?></p>
                                    <?php endif; ?>
                                    <div class="dropdown-divider"></div>
                                    <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) : ?>
                                        <a class="dropdown-item" href="updateProfil.php">Update Profil</a>
                                    <?php endif; ?>
                                    <div class="dropdown-divider"></div>
                                    <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) : ?>
                                        <a class="dropdown-item" href="orders.php">Orders</a>
                                    <?php endif; ?>
                                    <div class="dropdown-divider"></div>
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

            <div id="content-wrapper">

                <div class="container-fluid">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i> Data Table</div>
                            <div class="card-body">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Detail Produk</th>
                                            <th>Tanggal dan Waktu Pembelian</th>
                                            <th>Total Harga</th>
                                            <th>Status Pembelian</th>
                                            <th>Metode Pembelian</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($purchases as $purchase) : ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <!-- Tampilkan data ke sini -->
                                            <td>
                                                <?php $details = query("SELECT * FROM `order` WHERE id_user = '$_SESSION[id_user]'"); ?>
                                                Nama Barang : <?php echo $purchase["nama_barang"]; ?><br>
                                                Ukuran : <?php echo $purchase["ukuran"] ?><br>
                                                Kuantitas : <?php echo $purchase["kuantitas"] ?><br>
                                                <br>
                                            </td>
                                            <td><?php echo $purchase["waktu_pembelian"] ?></td>
                                            <td>Rp. <?php echo $purchase["harga_seluruh"] ?>,-</td>
                                            <td>
                                                <?php if($purchase["status_pembelian"] == 1) : ?>
                                                    <?php echo "<b>Completed</b>" ?>
                                                <?php else : ?>
                                                    <?php echo "Pending" ?>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $purchase["metode_pembelian"]; ?></td>
                                        
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
            </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
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

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/chart.js/Chart.min.js"></script>
        <script src="assets/vendor/datatables/jquery.dataTables.js"></script>
        <script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="assets/js/sb-admin.min.js"></script>
        <script src="assets/js/demo/datatables-demo.js"></script>
        <script src="assets/js/demo/chart-area-demo.js"></script>

    </body>

</html>