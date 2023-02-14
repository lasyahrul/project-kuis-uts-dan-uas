<?php

$nim = filter_var($_POST['nim'], FILTER_SANITIZE_STRING);
$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
$jurusan = filter_var($_POST['jurusan'], FILTER_SANITIZE_STRING);
$alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_STRING);

// cek data kosong
if (empty($nim) || empty($nama) || empty($jurusan) || empty($alamat)) {
    echo "<script>
            alert('Data tidak boleh kosong');
            window.location.href = 'index.php?page=mahasiswa';
    </script>";
} else {
    //cek nim
    $cek = $con->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $cek->bindParam(1, $nim);
    $cek->execute();

    if ($cek->rowCount() == 0) {
        # nim tidak ada -> insert ke db
        $sql = "INSERT INTO mahasiswa VALUES (?,?,?,?)";
        //$simpan = $con->exec($sql);   
        $simpan = $con->prepare($sql);
        $simpan->bindParam(1, $nim);
        $simpan->bindParam(2, $nama);
        $simpan->bindParam(3, $jurusan);
        $simpan->bindParam(4, $alamat);
        $simpan->execute();

        if ($simpan->rowCount() > 0) {
            echo "<script>
                alert('Data Berhasil disimpan');
                window.location.href = 'index.php?page=mahasiswa'; 
            </script>";
        } else {
            echo "<script>
                alert('Data Gagal disimpan');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
        }
    } else {
        # nim ada
        echo "<script>
                alert('NIM sudah ada!');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
    }
}
