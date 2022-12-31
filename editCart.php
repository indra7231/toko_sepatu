<?php
session_start();
require 'config/connect.php';
$id = $_GET["id"];

if( !isset($_SESSION["nama_user"]) && !isset($_SESSION["id_user"])) {
    header("Location: login.php");
}


// Query
$preOrders = query("SELECT * FROM pre_order WHERE id_preOrder = '$id'")[0];

if(isset($_POST["beli"])) {
    $users = query("SELECT * FROM user WHERE nama_user = '$_SESSION[nama_user]'");
    foreach($users as $user) {
        if ($user["prov_user"] == NULL && $user["kota_user"] == NULL && $user["alamat_user"] == NULL && $user["tlpn_user"] == NULL) {
            echo "
                <script>
                    alert('Lengkapi Data Diri Anda!!!');
                    document.location.href='updateProfil.php';
                </script>";
            exit;
        }
    }
      
      if (buy($_POST) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Ditambah!');
                    document.location.href='orders.php';
                </script>";
                hapusCart($id);
    } else {
        echo "
                <script>
                    alert('Data Gagal Ditambah!!!');
                    document.location.href='cart.php';
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
    <title>Checkout</title>
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

<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="product">
					<div class="row">
						<div class="col-md-5">
							<ul class="prod-slider">
								<li style="background-image: url(assets/img/<?php echo $preOrders["gambar_barang"] ?>); list-style: none;"></li>
                            </ul>
						</div>
						<div class="col-md-7">
							<div class="p-title"><h2><?php echo $preOrders["nama_barang"] ?></h2></div>

							<div class="p-short-des">
								<p>
                                <?php $SdescS = query("SELECT Sdesc FROM barang WHERE nama_barang = '$preOrders[nama_barang]'"); ?>
                                                <?php foreach ($SdescS as $Sdesc) : ?>
								    <p style="padding: 0px; margin-top: 0px; text-rendering: optimizelegibility; margin-bottom: 0px !important; line-height: 32px !important;">
                                        <span id="productTitle" class="a-size-large product-title-word-break" style="text-rendering: optimizelegibility; word-break: break-word; line-height: 32px !important; font-family: Roboto;">
                                        <?php echo $Sdesc["Sdesc"] ?>
                                        </span>
                                        <?php endforeach; ?>
                                    </p>
                                </p>
							</div>
                            <form action="" method="post">
                                <div class="p-quantity">
                                    <div class="row">
                                        <div class="col-md-12 mb_20">
                                            Pilih Ukuran <br>
                                            <select name="ukuran" class="form-control" style="width:auto;">
                                                <option value="<?php echo $preOrders["ukuran"]; ?>"><?php echo $preOrders["ukuran"]; ?></option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="p-price">
                                    <span style="font-size:14px;">Harga Barang</span><br>
                                    <span>Rp <?php echo $preOrders["harga_satuan"] ?>,-</span>
                                </div>
                                <input type="hidden" name="idpreOrder" value="<?php echo $preOrders["id_preOrder"] ?>">
                                <input type="hidden" name="idBarang" value="<?php echo $preOrders["id_barang"] ?>">
                                <input type="hidden" name="hargaSatuan" value="<?php echo $preOrders["harga_satuan"] ?>">
                                <input type="hidden" name="namaBarang" value="<?php echo $preOrders["nama_barang"] ?>">
                                <input type="hidden" name="gambarBarang" value="<?php echo $preOrders["gambar_barang"] ?>">
                                <input type="hidden" name="idUser" value="<?php echo $preOrders["id_user"] ?>">
                                <div class="p-quantity">
                                    Jumlah <br>
                                    <input type="number" class="input-text qty" name="kuantitias" value="<?php echo $preOrders["kuantitias"] ?>">
                                </div>
                                <select name="metodePembelian" class="form-control" style="width:auto;" required>
                                    <option value="">--Pilih</option>
                                    <?php $payments = query("SELECT * FROM pembayaran"); ?>
                                    <?php foreach ($payments as $payment) : ?>
                                    <option value="<?php echo $payment["metode_pembelian"]; ?>"><?php echo $payment["metode_pembelian"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label class="form-label mt-2" for="form1"><b>Metode Pembayaran</b></label>

                                <div class="btn-cart btn-cart1 mt-3">
                                    <input type="submit" value="Buy Now" name="beli">
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
                            <?php $LdescS = query("SELECT Ldesc FROM barang WHERE nama_barang = '$preOrders[nama_barang]'"); ?>
                            <?php foreach ($LdescS as $Ldesc) : ?>
                                <p><?php echo $Ldesc["Ldesc"] ?></p>
                            <?php endforeach; ?>
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