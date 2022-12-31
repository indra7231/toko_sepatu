<?php 
session_start();
require 'config/connect.php';

if( !isset($_SESSION["nama_user"]) && !isset($_SESSION["id_user"])) {
  header("Location: login.php");
}

$preOrders = query("SELECT * FROM pre_order WHERE id_user = '$_SESSION[id_user]'");

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

<body style="background-color: #eee;">

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

    <section class="h-100">
      <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-10">
            
            <form action="" method="post">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            </div>
            
            <?php $total = 0; ?>
            <?php foreach ($preOrders as $preOrder) : ?>
              <div class="card rounded-3 mb-4">
                <div class="card-body p-4">
                  <div class="row d-flex justify-content-evenly align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="assets/img/<?php echo $preOrder["gambar_barang"]; ?>"
                        class="img-fluid rounded-3" alt="">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2"><?php echo $preOrder["nama_barang"]; ?></p>
                      <p><span class="text-muted">Size: </span><?php echo $preOrder["ukuran"]; ?></p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <p><span class="text-muted">Kuantitas : </span><?php echo $preOrder["kuantitias"]; ?></p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mb-0">Rp. <?php echo $preOrder["total"] ?>,-</h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="editCart.php?id=<?php echo $preOrder['id_preOrder'] ?>" class="btn btn-sm btn-info mb-2">checkout</a>
                      <a href="hapusCart.php?id=<?php echo $preOrder['id_preOrder']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                    <?php $total += $preOrder["total"]; ?>
                      
                    </div>
                  </div>
              </div>
              <?php endforeach; ?>
        

        <div class="card">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <h4 class="ml-5">Total : </h4>
              <h5 class="mr-5">Rp. <?php echo $total; ?>,-</h5>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </form>
  </section>

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

