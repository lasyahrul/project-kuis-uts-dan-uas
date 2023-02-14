<?php
require_once '../config/fungsi.php';
require_once 'config/koneksi.php';

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
        <div class="row mt-5">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Form Login
                    </div>
                    <div class="card-body">
                        <form action="ceklogin.php" method="POST">
                            <div class="mb-1">
                                <label class="form-label" for="">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                            </div>
                            <div class="mb-1 d-grid">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>