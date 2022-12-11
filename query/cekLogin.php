<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../koneksi/koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($db, "select * from user where username='$username' and password='$password'");
$row = mysqli_fetch_array($data);


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0 && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['rememberme'])) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['status'] = "login";

    setcookie("username", $row['username'], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("role", $row['role'], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("id", $row['id'], time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie("password", $row['password'], time() + (86400 * 30), "/"); // 86400 = 1 day

    // echo $_SESSION['role'];
    // die();

    header("location:../index.php?page=home&pesan=login");
} elseif ($cek > 0 && isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['status'] = "login";

    header("location:../index.php?page=home&pesan=login");
} else {
    header("location:../index.php?page=login&pesan=gagal");
}
