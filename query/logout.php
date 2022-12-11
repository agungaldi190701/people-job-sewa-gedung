<?php

// menghilangkan cookie yang telah terdafar
setcookie("username", "", time() - 3600, "/");
setcookie("role", "", time() - 3600, "/");
setcookie("id", "", time() - 3600, "/");
setcookie("password", "", time() - 3600, "/");

// mengaktifkan session
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
header("location:../index.php?pesan=logout");
