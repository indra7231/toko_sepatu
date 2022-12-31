<?php 
session_start();
require 'config/connect.php';

if( !isset($_SESSION["nama_user"]) && !isset($_SESSION["id_user"])) {
    header("Location: login.php");
}

$users = query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'")[0];
// var_dump($users);

if(isset($_POST["updateProfil"])) {
    
    // Cek apakah data berhasil ditambahkan atau tidak
    if (updateProfil($_POST) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Diubah!!!');
                    document.location.href='updateProfil.php';
                </script>";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah!!!');
                    document.location.href='updateProfil.php';
                </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profil User</title>
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

    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <h2 class="mb-3">Profil User</h2>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $users["id_user"] ?>">
                                <input type="hidden" name="pass" value="<?php echo $users["pass_user"] ?>">
                                
                                <div class="row justify-content-evenly">
                                    <!-- <div class="col-lg-3"> -->
                                        <div class="col-4 form-group">
                                            <label for="namaUser">Username : </label>
                                            <input class="form-control" type="text" name="namaUser" value="<?php echo $users["nama_user"] ?>" id="namaUser" placeholder="Username..." >
                                        </div>
                                        <div class="col-4 form-group">
                                            <label for="phone">Phone : </label>
                                            <input class="form-control" type="number" name="phone" value="<?php echo $users["tlpn_user"] ?>" id="phone" placeholder="Phone..." required>
                                        </div>
                                </div>
                                <div class="row justify-content-evenly">
                                        <div class="col-4 form-group">
                                            <label for="prov">Provinsi : </label>
                                            <input class="form-control" type="text" name="provinsi" value="<?php echo $users["prov_user"] ?>" id="prov" placeholder="prov" required>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label for="kota">Kota : </label>
                                            <input class="form-control" type="text" name="kota" value="<?php echo $users["kota_user"] ?>" id="kota" placeholder="kota" required>
                                        </div>
                                </div>
                                        <div class="form-group">
                                        <label for="alamat" class="col-sm-3 control-label">Alamat : </label>
                                            <div class="col-sm-8">
                                                <textarea name="alamat" class="form-control" cols="30" rows="10" id="alamat"><?php echo $users["alamat_user"] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="updateProfil" value="Update Profil" class="btn btn-sm btn-info">
                                        </div>
                            </form>
                        </div>

                    </div>

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