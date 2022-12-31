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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <style>
        .well-sm {
            padding: 9px;
            border-radius: 3px;
        }
        .well {
            min-height: 20px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
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

    <div class="container text-center mb-4 mt-2">
        <h1>Contact Us</h1>
    </div>

    <div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <h3>Contact Form</h3>
                <div class="alert alert-success d-none my-alert" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="well well-sm">
                        <form action="" method="post" name="shoes-shop-contact">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"><b>Name</b></label>
                                        <input type="text" class="form-control" name="nama" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b>Email Address</b></label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email address">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b>Phone Number</b></label>
                                        <input type="text" class="form-control" name="telpon" placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"><b>Message</b></label>
                                        <textarea name="pesan" class="form-control" rows="9" cols="25" placeholder="Enter message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary btn-kirim">
                                    <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <legend style="margin-bottom: 20px; border: 0; border-bottom: 1px solid #e5e5e5;">Our office</legend>
                        <address>
                            Jln. Pulau Sabesi <br>
                            Sukarame,Bandar Lampung
                        </address>
                        <address>
                            <strong>Phone:</strong><br>
                            <span>+62-888-8888-8888</span>
                        </address>
                        <address>
                            <strong>Email:</strong><br>
                            <a href="mailto:" style="text-decoration : none; color: black;"><span>support@shoesshopphp.com</span></a>
                        </address>
                    </div>
                </div>
            </div>
            <h3 class="mt-3">Find Us On Map</h3>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.20740866424!2d105.29677201412967!3d-5.385324355346116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40db429b01987d%3A0x519232355cd50912!2sJl.%20Pulau%20Sebesi%2C%20Sukarame%2C%20Kec.%20Sukarame%2C%20Kota%20Bandar%20Lampung%2C%20Lampung%2035131!5e0!3m2!1sid!2sid!4v1670634185717!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mb-4">
                </iframe>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin.min.js"></script>

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbxOTDgfjDaUCEEqAWDPHIKnED8G47vJUdQtIjE11ZnJ16HrJjhmDLlnt69BBNskcvs/exec'; 
        const form = document.forms['shoes-shop-contact'];
        const btnKirim = document.querySelector('.btn-kirim');
        const btnLoading = document.querySelector('.btn-loading');
        const myAlert = document.querySelector('.my-alert');

        form.addEventListener('submit', e => {
            e.preventDefault();
            // Ketika tombol submit diklik
            // tampilkan tombol loading, hilangkan tombol loading
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

            fetch(scriptURL, { method: 'POST', body: new FormData(form)})
            .then(response => {

                    // tampilkan tombol kirim, hilangkan tombol loading
                    btnLoading.classList.toggle('d-none');
                    btnKirim.classList.toggle('d-none');

                    // tampilkan alert
                    setTimeout(function () {
                        
                            myAlert.classList.toggle('d-none');
                        },2500);

                    // reset form
                    form.reset();
                    myAlert.classList.toggle('d-none');
                    console.log('Success!', response);

                })
            .catch(error => console.error('Error!', error.message));
        });
    </script>

</body>

</html>