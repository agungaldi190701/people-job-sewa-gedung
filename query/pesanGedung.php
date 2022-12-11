<?php
include '../koneksi/koneksi.php';

if (isset($_POST["idGedung"])) {
    $idGedung = $_POST["idGedung"];
    $tglAwal = $_POST["tanggalMulai"];
    $tglAkhir = $_POST["tanggalSelesai"];
    $iduser = $_POST["idUser"];


    // print_r($idGedung . " " . $tglAwal . " " . $tglAkhir . " " . $iduser);
    // die();

    $db->query("UPDATE `gedung` SET `status` = '1' WHERE `gedung`.`id` = $idGedung");
    $db->query("INSERT INTO `list-sewa` (`id`, `userId`, `gedungId`, `tanggalMulai`, `tanggalselesai`,`status`) VALUES (NULL, '$iduser', '$idGedung', '$tglAwal', '$tglAkhir',1)");



    $pesan = "Data Berhasil Diubah";
    header("location:../index.php?page=home");
}
