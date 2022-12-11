<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Albi Daud</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=home"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=list-sewa"><i class="fas fa-table"></i> list-sewa</a>
                </li>

                <?php

                if ($_SESSION['role'] == '1') {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-list"></i> Olah Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?page=daftar-gedung"><i class="fas fa-house-damage"></i> Daftar Gedung</a></li>

                        </ul>
                    </li>
                <?php
                }

                ?>

            </ul>
            <div class="d-flex">

                <?php
                if (!isset($_SESSION['username'])) {
                ?>
                    <a href="index.php?page=login" class="btn btn-success "><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['username'])) {
                ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <?php
                            echo $_SESSION['username'];
                            ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="query/logout.php"><i class="fa-solid fa-sign-out-alt"></i> Logout</a></li>

                        </ul>
                    </div>


                <?php
                }
                ?>

            </div>

        </div>
    </div>
</nav>