<?php
include '../koneksi/koneksi.php';

if (isset($_POST["nama"])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nohp = $_POST["nohp"];
    $jk = $_POST["jk"];

    // echo $nama . "<br>" . $alamat . "<br>" . $username . "<br>" . $password . "<br>" . $nohp . "<br>" . $jk;

    // die();

    $query = $db->query("insert into user(nama,username,password,hp,alamat,jk,role) 
     values('$nama','$username','$password','$nohp','$alamat','$jk',0)");

    // die();
    // mysqli_query($db, $query);


    $pesan = "Tambah Data Berhasil";
    header("location:../index.php?page=login");
}
