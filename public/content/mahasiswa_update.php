<?php

$nim = filter_var($_POST['nim'], FILTER_SANITIZE_STRING);
$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
$jurusan = filter_var($_POST['jurusan'], FILTER_SANITIZE_STRING);
$alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_STRING);

// cek data kosong
if (empty($nim) || empty($nama) || empty($jurusan) || empty($alamat)) {
    echo "<script>
            alert('Data tidak boleh kosong');
            window.location.href = 'index.php?page=mahasiswa_edit&nim=$nim';
    </script>";
} else {
    $sql = "UPDATE mahasiswa SET nama = :nama, jurusan = :jurusan, alamat = :alamat WHERE nim = :nim";
    $simpan = $con->prepare($sql);
    $simpan->bindParam('nama', $nama);
    $simpan->bindParam('jurusan', $jurusan);
    $simpan->bindParam('alamat', $alamat);
    $simpan->bindParam('nim', $nim);

    $simpan->execute();

    if ($simpan->rowCount() > 0) {
        echo "<script>
                alert('Data Berhasil diubah');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal diubah');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
    }
}
