<?php 
session_start();
require 'config/connect.php';

$id = $_GET["id"];

// Query
$products = query("SELECT * FROM barang WHERE id_barang = $id")[0];

if(isset($_POST["addtoCart"])) {
    if( !isset($_SESSION["nama_user"]) && !isset($_SESSION["id_user"])) {
        header("Location: login.php");
    }

    $BfrtoCarts = query("SELECT * FROM pre_order WHERE nama_barang = '$products[nama_barang]'");

    foreach($BfrtoCarts as $BfrtoCart) {
        if($BfrtoCart["nama_barang"] == $products["nama_barang"] && $BfrtoCart["id_user"] == $_SESSION["id_user"]) {
            echo "<script> alert('Barang sudah masuk cart!!') </script>";
            echo "
                    <script>
                        document.location.href='index.php';
                    </script>";
                    exit; 
                }
    
    }
    if (addCart($_POST) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Ditambah!');
                    document.location.href='cart.php';
                </script>";
    } else {
        echo "
                <script>
                    alert('Data Gagal Ditambah!!!');
                    document.location.href='index.php';
                </script>";
    }      
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Product</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css">
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
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                    <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) : ?>
                                        <a class="dropdown-item" href="updateProfil.php">Update Profil</a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                    <div class="dropdown-divider"></div>
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

<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product">
					<div class="row">
						<div class="col-md-5">
							<ul class="prod-slider">
								<li style="background-image: url(assets/img/<?php echo $products["gambar_barang"] ?>); list-style: none;"></li>
                            </ul>
							<!-- <div id="prod-pager"></div> -->
						</div>
						<div class="col-md-7">
							<div class="p-title"><h2><?php echo $products["nama_barang"] ?></h2></div>

							<div class="p-short-des">
								<p>
								    <p style="padding: 0px; margin-top: 0px; text-rendering: optimizelegibility; margin-bottom: 0px !important; line-height: 32px !important;">
                                        <span id="productTitle" class="a-size-large product-title-word-break" style="text-rendering: optimizelegibility; word-break: break-word; line-height: 32px !important; font-family: Roboto;">
                                        <?php echo $products["Sdesc"] ?>
                                        </span>
                                    </p>
                                </p>
							</div>
                            <form action="" method="post">
                                <div class="p-quantity">
                                    <div class="row">
                                        <div class="col-md-12 mb_20">
                                            Pilih Ukuran <br>
                                            <select name="ukuran" class="form-control" style="width:auto;" required>
                                                <?php $sizes = query("SELECT besar_ukuran FROM ukuran WHERE id_ukuran = '$products[id_ukuran]'"); ?>
                                                <?php foreach ($sizes as $size) : ?>
                                                <option value="">--Pilih Ukuran</option>
                                                <option value="<?php echo $size["besar_ukuran"]; ?>"><?php echo $size["besar_ukuran"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="p-price">
                                    <span style="font-size:14px;">Harga Barang</span><br>
                                    <span>Rp <?php echo $products["harga_barang"] ?>,-</span>
                                </div>
                                <input type="hidden" name="hargaBarang" value="<?php echo $products["harga_barang"] ?>">
                                <input type="hidden" name="namaBarang" value="<?php echo $products["nama_barang"] ?>">
                                <input type="hidden" name="gambarBarang" value="<?php echo $products["gambar_barang"] ?>">
                                <input type="hidden" name="idBarang" value="<?php echo $products["id_barang"] ?>">
                                <?php if( isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) :?>
                                <?php $users = query("SELECT id_user FROM user WHERE id_user = '$_SESSION[id_user]'"); ?>
                                                <?php foreach ($users as $user) : ?>
                                                    <input type="hidden" name="idUser" value="<?php echo $user["id_user"] ?>">
                                                <?php endforeach; ?>
                                                <?php else : ?>
                                                    <input type="hidden" name="idUser" value="">
                                                <?php endif; ?>
                                <div class="p-quantity">
                                    Jumlah <br>
                                    <input type="number" class="input-text qty" name="kuantitas" value="1">
                                </div>
                                <div class="btn-cart btn-cart1">
                                    <input type="submit" class="fas" value="&#xf217; Add to Cart" name="addtoCart">
                                </div>
                            </form>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-tabs">
								<li role="presentation" class="active">Deskripsi Barang</li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
                                <p><?php echo $products["Ldesc"] ?></p>
							</div>
						</div>
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