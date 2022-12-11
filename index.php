<?php require 'koneksi/koneksi.php';
error_reporting(0);
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
$id = $_SESSION['id'];

?>

<!-- cek cookies -->
<?php
if (isset($_COOKIE['username']) && isset($_COOKIE['role']) && isset($_COOKIE['id']) && isset($_COOKIE['password'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['role'] = $_COOKIE['role'];
    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['status'] = "login";
}
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
</head>

<body>
    <?php include('support/menu.php') ?>
    <br>
    <div class="container">

        <div class="row">
            <div class="col">
                <!-- cek apakah sudah login -->




                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];



                    switch ($page) {
                        case 'home':
                            include "content/home.php";
                            break;
                        case 'daftar':
                            include "content/daftar.php";
                            break;
                        case 'daftar-gedung':
                            include "content/gedung.php";
                            break;
                        case 'login':
                            include "content/login.php";
                            break;
                        case 'list-sewa':
                            include "content/listSewa.php";
                            break;
                    }
                } elseif (isset($_GET['id'])) {
                    include "content/editGedung.php";
                } else {
                    include "content/home.php";
                }


                ?>

            </div>
        </div>
    </div>
    <br><br><br>
    <?php include('support/footer.php') ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1dd41b5c5a.js" crossorigin="anonymous"></script>

    <!-- datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>