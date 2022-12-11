<!-- Alert Untuk Setiap Login / Logout , yang diterima dari $_GET['pesan'] -->
<?php
if ($_GET['pesan'] == "logout") {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!!</strong> Anda Berhasil Logout
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
} elseif ($_GET['pesan'] == "login") {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Login!!</strong> Selamat Datang <?php echo $username ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}  ?>

<!-- ##########END Alert Untuk Setiap Login / Logout , yang diterima dari $_GET['pesan'] ################-->




<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/gedung1.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Gedung Paduan Suara</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/gedung2.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Gedung Geraha Putra</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/gedung3.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Gedung Rapat Terbuka</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<br>
<hr>
<br><br>

<h3>
    <center>Daftar Gedung</center>
</h3>
<br><br>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php

    $query = mysqli_query($db, "SELECT * FROM gedung");

    $no = 1;

    ?>

    <?php while ($data = mysqli_fetch_array($query)) { ?>

        <div class="col">
            <div class="card h-100">
                <img src="img/<?= $data['gambar'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['nama']; ?></h5>
                    <p class="card-text"><?= $data['alamat']; ?></p>
                    <p class="card-text"><?= $data['harga']; ?></p>

                </div>
                <div class="card-footer">

                    <!-- Button trigger modal -->
                    <?php
                    if ($_SESSION['status'] != "login") {
                    ?>
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#belumLogin">
                            Pesan
                        </button>
                    <?php
                    } else {
                    ?>
                        <button type="button" class="btn 
                    <?php
                        if ($data['status'] == 1) {
                            echo "btn-danger float-end disabled";
                        } else {
                            echo "btn-success float-end";
                        }
                    ?>
                    " data-bs-toggle="modal" data-bs-target="#sudahLogin<?= $data['id']; ?>">
                            <?php
                            if ($data['status'] == 1) {
                                echo "Boooked";
                            } else {
                                echo "Pesan";
                            }
                            ?>
                        </button>

                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>
        <!-- Modal Sudah Login -->
        <div class="modal fade" id="sudahLogin<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="query/pesanGedung.php" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Silahkan isi form </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Anda Akan memesan Gedung <?= $data['nama']; ?> Ini?
                            <br>
                            <br>
                            <input type="hidden" name="idGedung" id="" value="<?= $data['id']; ?>">
                            <input type="hidden" name="idUser" id="" value="<?= $id ?>">
                            <div class="mb-3">
                                <label for="tanggalMulai" class="form-label">Tanggal Booking</label>
                                <input type="date" class="form-control" id="tanggalMulai" name="tanggalMulai">
                            </div>
                            <div class="mb-3">
                                <label for="tanggalSelesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggalSelesai" name="tanggalSelesai">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" name="pesan" class="btn btn-primary">Ya, Pesan</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>




<!-- Modal Belum Login-->
<div class="modal fade" id="belumLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perhatian!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda Harus Login dulu untuk memesan gedung
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <a href="index.php?page=login" class="btn btn-primary">Login</a>

                </div>
            </form>
        </div>
    </div>
</div>


<br>
<br>
<hr>

<br>
<br>
<h3>
    <center>Persentase Gedung</center>
</h3><br>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">

            <div class="col-xl-12">
                <div class="card proj-progress-card">
                    <div class="card-block">
                        <div class="row mt-3 my-4 mx-3">
                            <div class="col-xl-3 col-md-6">
                                <h6>Kebersihan Gedung</h6>
                                <div class="progress">
                                    <div class="progress-bar  progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <h6>Team Pengolah Gedung</h6>

                                <div class="progress">
                                    <div class="progress-bar bg-c-blue" style="width:65%"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <h6>Kenyamanan</h6>
                                <div class="progress">
                                    <div class="progress-bar bg-c-green" style="width:85%"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <h6>Akses Gedung</h6>

                                <div class="progress">
                                    <div class="progress-bar bg-c-yellow" style="width:45%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<br>
<hr>
<br><br>

<!-- maps -->
<div class="container">
    <div class="row">
        <div class="col">
            <h3>
                <center>Google Maps Gedung</center>
            </h3>
            <br>
            <div class="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6891976397724!2d106.66447900000001!3d-6.5608602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69db995ab8f3f9%3A0xb03f0862fcce4b75!2sMobilegamestore.id!5e0!3m2!1sid!2sid!4v1667062945451!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
<br>
<hr>
<br><br>