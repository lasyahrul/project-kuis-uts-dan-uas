<?php
session_start();
require_once '../config/fungsi.php';
require_once 'config/koneksi.php';

if (empty($_SESSION['ti3c_user'])) {
    echo "<script>
                window.location.href = 'login.php';
            </script>";
} else {

    $user = $_SESSION['ti3c_user'];
    $level = $_SESSION['ti3c_level'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <style>
            body {
                background-color: #eee;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <!-- <div class="row mt-3">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../img/back2.jpg" class="d-block w-100 rounded" alt="...">
                        </div>
                        <div class="carousel-item active">
                            <img src="../img/back2.jpg" class="d-block w-100 rounded" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div> -->
            <div class="row mt-2">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                                    <a class="nav-link" href="index.php?page=tentang">Tentang</a>
                                    <a class="nav-link" href="index.php?page=galeri"><i class="bi bi-images"></i> Galeri</a>
                                    <a class="nav-link" href="index.php?page=kontak"><i class="bi bi-telephone-fill"></i> Kontak</a>
                                    <a class="nav-link" href="index.php?page=mahasiswa">Mahasiswa</a>
                                    <a class="nav-link" href="index.php?page=user">User</a>
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- kontent -->
            <?php
            $dir = "content";
            $page = @$_GET['page'];

            if (empty($page)) {
                include 'content/home.php';
            } else {
                $scan = scanFile($dir, $page);
                if ($scan === 1) {
                    include "content/$page.php";
                } else {
                    include 'content/404.php';
                }
            }
            ?>
            <!-- kontent -->
        </div>

        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php } ?>