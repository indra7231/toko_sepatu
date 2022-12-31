<?php 
session_start();
require 'config/connect.php';

if( !isset($_SESSION["nama_user"]) && !isset($_SESSION["id_user"])) {
    header("Location: login.php");
}

// Tangkap id yang akan dihapus
$id = $_GET["id"];

if (hapusCart($id) > 0) {
    echo "
            <script>
                alert('Data Berhasil Dihapus!!!');
                document.location.href='cart.php';
            </script>";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus!!!');
                    document.location.href='cart.php';
                </script>";
    }



?>