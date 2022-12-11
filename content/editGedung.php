<?php if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    $query = mysqli_query($db, "SELECT * FROM gedung WHERE id='$id'");
    $data = mysqli_fetch_array($query);
?>
    <div class="card col-md-11 mx-auto p-0">
        <div class="card-header">
            <h3 class="card-title">Form Edit Data</h3>
            <div class="card-body">
                <form class="form-horizontal" id="quickForm" method="post" action="query/updateGedung.php" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $data['nama']; ?>" placeholder="Ex : Nama ..." required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="harga" class="form-control" id="harga" value="<?= $data['harga']; ?>" placeholder="Ex : Harga ..." required>

                                    </div>

                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-2 col-form-label">alamat </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $data['alamat']; ?>" placeholder="Ex : alamat ..." required>

                                    </div>

                                </div>
                                <br>

                                <div class="form-group row">
                                    <label for="harga" class="col-sm-2 col-form-label">status </label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-select" id="status">
                                            <option value="<?= $data['status'] ?>">
                                                <?php
                                                if ($data['status'] == 0) {
                                                    echo "Tersedia";
                                                } else {
                                                    echo "Booked";
                                                }
                                                ?>
                                            </option>
                                            <option value="0">Tersedia</option>
                                            <option value="1">Booked</option>
                                        </select>

                                    </div>

                                </div>
                                <br>

                                <div class="form-group row">
                                    <label for="gambar" class="col-sm-2 col-form-label">Pilih Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="gambar" id="gambar" accept="image/jpeg,image/png,image/gif">

                                    </div>

                                </div>


                            </div>
                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                            <div class="col-md-4 text-center">
                                <img src="img/<?php echo $data['gambar'] ?> " width="90%">
                            </div>
                        </div>


                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="index.php?page=daftar-gedung " class="btn btn-secondary ">Back</a>


                            <a href="query/hapusGedung.php?id=<?= $data['id']; ?>" class="btn btn-danger float-right" onclick="return confirm('Yakin ingin menghapus data ini?')"> <i class="fa fa-trash"></i> Hapus</a>


                        </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>