<?php 

session_start();
require "config/connect.php";
$error ='';

if (isset($_POST["login"])) {
    global $con;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result= mysqli_query ($con, "SELECT * FROM user WHERE nama_user = '$username'");
    $row = mysqli_num_rows($result);
    
    
    
    $data = mysqli_fetch_assoc($result);
    $_SESSION["id_user"] = $data["id_user"];
    $_SESSION["nama_user"] = $data["nama_user"];
    
    if ( $row > 0) {
        if( password_verify($password, $data["pass_user"]) ) {
            // Cek password
            if(isset($_SESSION["nama_user"]) && isset($_SESSION["id_user"])) {
                header("Location: index.php");
                exit;
            }
        }
    } 

        $error = "Username / Password yang anda masukkan salah!";
    
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

    <title>Login</title>
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
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
                    <button class="btn btn-primary btn-block" name="login">Login</button>
                </form>

                <p><?php echo $error; ?></p>

                
                <div class="text-center">
                    <a class="d-block small mt-3" href="register.php">Register an Account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>