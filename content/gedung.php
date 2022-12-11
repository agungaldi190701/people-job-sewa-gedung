<?php
//mengambil variabel login yg telah di daftarkan cookies
$user = $_COOKIE['username'];
$pass = $_COOKIE['password'];
if (!isset($user)) { //kondisi jika cookies user tidak ada maka halaman memanggil formlogin kembali
    echo "<script>document.location='index.php?page=login';</script>";
} else {
    //kondisi jika cookies user ada maka halaman akan menampilkan isi dari cookies

}



?>


<style>
    .table>tbody>tr>* {
        vertical-align: middle;
    }
</style>

<br>
<h3 class="text-center text-dark">Data Tabel Gedung</h3>

<br>
<div class=" table-responsive  ">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-plus"></i> Tambah
    </button>
    <br>
    <br>



    <br>
    <table class="table table-striped" id="example" style="width:100%">
        <thead>
            <tr>

                <th>No</th>
                <th>Opsi</th>
                <!-- <th>Gambar</th> -->
                <th>Nama Gedung</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = mysqli_query($db, "SELECT * FROM gedung");

            $no = 1;

            ?>
            <?php while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <a href="index.php?id=<?php echo $data['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>

                    </td>

                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['harga'] ?></td>
                    <?php
                    if ($data['status'] == 1) {
                    ?>

                        <td>
                            <span class="badge rounded-pill bg-danger">Booking</span>
                        </td>
                    <?php
                    } else {
                    ?>
                        <td>
                            <span class="badge rounded-pill bg-success">Ready</span>
                        </td>
                    <?php
                    }
                    ?>





                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>
<br><br>
<br><br>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gedung</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form id="quickForm" action="query/tambahGedung.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Gedung</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="">

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Pilih Gambar</label>
                            <input class="form-control" type="file" id="gambar" name="gambar">
                            <input class="form-control" type="hidden" id="status" name="status" value="0">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="simpan-data">Save Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>