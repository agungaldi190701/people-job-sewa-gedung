<?php
include '../koneksi/koneksi.php';
$id = $_GET['id'];

// print_r($id);
// die;

$gambarDB = $db->query("SELECT gambar FROM gedung WHERE id = '$id'");
$gambar = mysqli_fetch_array($gambarDB);




unlink('../img/' . $gambar['gambar']);
$db->query("DELETE FROM gedung WHERE id = '$id'");

header("location:../index.php?page=daftar-gedung");
