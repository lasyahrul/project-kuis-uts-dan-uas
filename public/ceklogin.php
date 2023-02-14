<?php
session_start();
require_once 'config/koneksi.php';


$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if (empty($username) || empty($password)) {
    echo "<script>
            alert('Username / Password tidak boleh kosong');
            window.location.href = 'login.php';
    </script>";
} else {
    #cek username
    $cek = $con->prepare("SELECT * FROM user WHERE username = ?");
    $cek->bindParam(1, $username);
    $cek->execute();

    if ($cek->rowCount() == 0) {
        # username tidak ada
        echo "<script>
                alert('Username tidak ada!');
                window.location.href = 'login.php';
            </script>";
    } else {
        # username ada, cek password
        $data = $cek->fetch();
        if (password_verify($password, $data['password'])) {
            # password benar, buat session

            $_SESSION['ti3c_user'] = $data['username'];
            $_SESSION['ti3c_level'] = $data['level'];

            echo "<script>
                window.location.href = 'index.php';
            </script>";
        } else {
            # password salah
            echo "<script>
                alert('Username / Password salah!');
                window.location.href = 'login.php';
            </script>";
        }
    }
}
