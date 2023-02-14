<?php

$nama_file = $_FILES['gambar']['name'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$type_file = $_FILES['gambar']['type'];
$size_file = $_FILES['gambar']['size'];

$allowType = ['png', 'jpg', 'jpeg'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);

// echo $ext;

if (empty($nama_file)) {
    echo "File Kosong";
} else {
    //cek tipe file
    if (in_array($ext, $allowType)) {
        //cek ukuran file
        if ($size_file > 1000000) {
            echo "File tidak boleh lebih dari 1mb";
        } else {
            if (move_uploaded_file($tmp_file, "img/" . $nama_file)) {
                echo "File Berhasil diupload";
            } else {
                echo "File Gagal diUpload";
            }
        }
    } else {
        echo "File tidak support";
    }
}
