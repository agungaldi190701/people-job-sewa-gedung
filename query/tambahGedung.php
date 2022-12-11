<?php
include '../koneksi/koneksi.php';

if (isset($_POST["simpan-data"])) {
    $nama = $_POST["nama"];
    $gambar = $_FILES['gambar']['name'];
    $alamat = $_POST["alamat"];
    $harga = $_POST["harga"];
    $status = $_POST["status"];;


    move_uploaded_file($_FILES['gambar']['tmp_name'], '../img/' . $_FILES['gambar']['name']);
    substr(strrchr($gambar, "."), 1);


    // echo $gambar . "<br>" . $nama . "<br>" . $alamat . "<br>" . $harga . "<br>" . $status;
    // die();
    $query = $db->query("insert into gedung(nama,gambar,alamat,harga,status) 
     values('$nama','$gambar','$alamat','$harga','$status')") or die("Query gagal");


    // mysqli_query($db, $query);


    $pesan = "Data Berhasil Diubah";
    header("location:../index.php?page=daftar-gedung");
}
