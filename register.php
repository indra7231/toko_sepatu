<?php 

require "config/connect.php";

if(isset($_POST["register"])) {
    if (registere($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambah!!!');
            </script>";
            header('Location: login.php');
    } else {
        echo mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Account</title>
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username.." required="required" autofocus="autofocus">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password.." required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword2" name="password2" class="form-control" placeholder="Password.." required="required">
                            <label for="inputPassword2">Konfirmasi Password</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="register">Register</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.php">Have an Account ?</a>
                    <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>