<?php
require_once 'config/fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=profil">Profil</a></li>
        <li><a href="index.php?page=kontak">Kontak</a></li>
        <li><a href="index.php?page=nilai">Input Nilai</a></li>
        <li><a href="index.php?page=galeri">Galeri</a></li>
        <li><a href="index.php?page=mahasiswa">Mahasiswa</a></li>
    </ul>
    <div class="content">
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
    </div>
</body>

</html>