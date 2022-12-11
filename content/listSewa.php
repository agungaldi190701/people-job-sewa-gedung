<style>
    .table>tbody>tr>* {
        vertical-align: middle;
    }
</style>

<br>
<h3 class="text-center text-dark">Daftar Orang Yang Sewa</h3>

<br>
<div class=" table-responsive  ">
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button> -->
    <br>
    <br>



    <br>
    <table class="table table-striped" id="example" style="width:100%">
        <thead>
            <tr>

                <th>No</th>
                <th>Nama Penyewa</th>
                <!-- <th>Gambar</th> -->
                <th>Nama Gedung</th>
                <th>Tanggal sewa</th>
                <th>Tanggal berakhir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query1 = mysqli_query($db, "SELECT `list-sewa`.`id` as id_sewa,`list-sewa`.`status` as status_sewa, gedung.id as id_gedung, user.id as id_user, gedung.nama as namaGedung , user.nama,gedung.status,`list-sewa`.tanggalMulai,`list-sewa`.`tanggalselesai` FROM `list-sewa` INNER JOIN gedung ON `list-sewa`.gedungId = gedung.id INNER JOIN user ON `list-sewa`.userId = user.id");



            $no = 1;
            $date = date('Y-m-d');

            ?>

            <?php while ($data = mysqli_fetch_array($query1)) {
                if ($date > $data['tanggalselesai'] && $data['status_sewa'] == 1) {
                    $db->query("UPDATE `list-sewa` SET status = 3 WHERE id = $data[id_sewa]");
                    $db->query("UPDATE `gedung` SET status = 0 WHERE id = $data[id_gedung]");
                }

            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <?= $data['nama']; ?>

                    </td>

                    <td><?php echo $data['namaGedung'] ?></td>
                    <td><?php echo $data['tanggalMulai'] ?></td>
                    <td><?php echo $data['tanggalselesai'] ?></td>

                    <?php
                    if ($data['status_sewa'] == 1) {
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