<?php

include '../koneksi/koneksi.php';

if (isset($_POST["nama"])) {
    $nama = $_POST["nama"];
    $gambar = $_FILES['gambar']['name'];
    $alamat = $_POST["alamat"];
    $harga = $_POST["harga"];
    $status = $_POST["status"];;
    $id = $_POST["id"];

    if ($_FILES['gambar']['name'] == "") {
        $db->query("Update gedung set nama='$nama',harga='$harga',alamat='$alamat',status='$status' where id='$id'");
    } else {
        unlink('../img/' . $gambarLama['gambar']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../img/' . $_FILES['gambar']['name']);
        substr(strrchr($gambar, "."), 1);


        $db->query("Update gedung set nama='$nama',harga='$harga',alamat='$alamat',status='$status',gambar='$gambar' where id='$id'");
    }




    $pesan = "Data Berhasil Diubah";
}
// $db->query("Update movie  set nama_movie='$namaMovie',harga_movie='$hargaMovie',id_studio='$idStudio',gambar='$gambar' where id_movie='$id'");
header("location:../index.php?page=daftar-gedung");
