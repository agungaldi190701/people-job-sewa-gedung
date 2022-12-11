<?php
include("koneksi/koneksi.php");

if (isset($_POST["btn-simpan"])) {
    $nama = $_POST["nama"];
    $berat = $_POST["berat"];
    $kelamin = $_POST["kelamin"];
    $usia = $_POST["usia"];
    $hipertensi = '';


    if ($berat == 'kur') {
        $hipertensi = 'tidak';
    }
    if ($berat == 'nor') {
        $hipertensi = 'tidak';
    }
    if ($berat == 'gem' and $kelamin == 'P') {
        $hipertensi = 'ya';
    }
    if ($berat == 'gem' and $kelamin == 'L' and $usia == 'mud') {
        $hipertensi = 'ya';
    }
    if ($berat == 'gem' and $kelamin == 'L' and $usia == 'tua') {
        $hipertensi = 'tidak';
    };



    $query = "INSERT INTO `hasil` (`id`, `nama`, `usia`, `kelamin`, `berat`, `hipertensi`) VALUES ('', '$nama', '$usia', '$kelamin', '$berat', '$hipertensi')";

    mysqli_query($db, $query);



    echo "<script >
    alert('Data Berhasil tambah , silahkan cek data anda di tabel hasil');
    </script>";
}
