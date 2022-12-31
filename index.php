<?php 
session_start();
require 'config/connect.php';
$products = query("SELECT * FROM barang");

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

    <style>
        .text-box {
            width: 80%;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -30%);
            text-align: center;
        }
        .text-box h5 {
            font-size: 50px;
        }
        .text-box p {
            margin: 10px 0 40px;
            font-size: 18px;
        }
        /* .gelap {
            position: relative;
            background: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7));
        } */
        .shadow {
            text-shadow: 0px 0px 5px black;
        }
    </style>

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
                        <a class="nav-link" href="#">Home</a>
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

        <div class="col">

            <div id="carouselExampleIndicators" class="carousel slide my-4 gelap" data-ride="carousel" style="">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="assets/img/slide1.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block text-box">
                            <h5 class="shadow">Welcome to Shoes Shop</h5>
                            <p class="shadow">Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/img/slide2.jpg" alt="Second slide" width="1000" height="590">
                        <div class="carousel-caption d-none d-md-block text-box">
                            <h5 class="shadow">Price and Quality Guarantee Accordingly</h5>
                            <p class="shadow">Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/img/slide3.jpg" alt="Third slide" width="1000" height="590">
                        <div class="carousel-caption d-none d-md-block text-box">
                            <h5 class="shadow">24 Hours Costumers Support</h5>
                            <p class="shadow">Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="text-center mt-5 mb-3">
                <h1>OUR PRODUCTS</h1>
            </div>

            <div class="row">

                <?php foreach($products as $product) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="product_info.php?id=<?php echo $product["id_barang"]; ?>"><img class="card-img-top" src="assets/img/<?php echo $product['gambar_barang']; ?>" alt="" width="100" height="300"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a style="text-decoration: none;" href="product_info.php?id=<?php echo $product["id_barang"]; ?>"><?php echo $product['nama_barang']; ?></a>
                            </h4>
                            <h5>Rp <?php echo $product['harga_barang']; ?>,-</h5>
                            <p class="card-text"><?php echo $product['Sdesc']; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="product_info.php?id=<?php echo $product["id_barang"]; ?>" class="btn btn-sm btn-info mb-3"><i class="fas fa-fw fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

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