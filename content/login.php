<?php
if (isset($_COOKIE['username'])) {
    header("location:index.php?page=home");
}
?>


<section class="vh-100">

    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="img/login.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Login gagal!</strong> username dan password salah!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php


                    }
                }
                ?>

                <form action="query/cekLogin.php" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="username" class="form-control form-control-lg" name="username" required />
                        <label class="form-label" for="username">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password" class="form-control form-control-lg" name="password" required />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- remember me -->
                    <div class="form-check" id="remember">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="rememberme" />
                        <label class="form-check" for="remember">Remember me</label>
                    </div>
                    <br>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    <a href="index.php?page=daftar" class="btn btn-secondary btn-lg btn-block">Register</a>


                </form>
            </div>
        </div>
    </div>
</section>



<!-- <br><br>
   <main class="form-signin">
       <form action="/" method="POST">

           <h1 class="h3 mb-5 fw-normal text-center">Please sign in</h1>
           <center><img class="mb-4" src="img/login.svg" alt="" width="100%" height="80">
           </center>

           <div class="form-floating">
               <label for="username">Username</label>

               <input type="email" class="form-control" id="username" name="username" placeholder="username..." autofocus required>

           </div>
           <div class="form-floating">
               <label for="floatingPassword">Password</label>
               <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
           </div>

           <div class="checkbox mb-3">

           </div>
           <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

       </form>

   </main> -->