<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">

                <div class="card rounded-3">
                    <br>
                    <center>
                        <img src="img/login.svg" class="w-50 " style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                    </center>
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                        <form class="px-md-2" action="query/register.php" method="POST">

                            <div class="form-outline mb-4">
                                <input type="text" id="nama" class="form-control" name="nama" />
                                <label class="form-label" for="nama">Name</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline datepicker">
                                        <input type="text" class="form-control" id="username" name="username" />
                                        <label for="username" class="form-label">Username</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline datepicker">
                                        <input type="password" class="form-control" id="password" name="password" />
                                        <label for="password" class="form-label">Password</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline datepicker">
                                        <input type="number" class="form-control" id="nohp" name="nohp" />
                                        <label for="nohp" class="form-label">Nomor Hp</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <select class="form-select" name="jk">
                                        <option>Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>

                                    </select>

                                </div>
                            </div>

                            <div class="mb-4">


                                <div class="form-outline">
                                    <input type="text" id="alamat" class="form-control" name="alamat" />
                                    <label class="form-label" for="alamat">Alamat</label>
                                </div>


                            </div>



                            <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>