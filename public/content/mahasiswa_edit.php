<?php if (isset($_GET['nim'])) : ?>
    <?php
    $nim = $_GET['nim'];
    $cari = $con->query("SELECT * FROM mahasiswa WHERE nim = '$nim'");
    $data = $cari->fetch();

    ?>

    <div class="row mt-2">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    Form Edit Mahasiswa
                </div>
                <div class="card-body">
                    <form action="index.php?page=mahasiswa_update" method="POST">
                        <div class="mb-1">
                            <label class="form-label" for="">NIM</label>
                            <input type="text" name="nim" class="form-control" placeholder="Masukan NIM Anda" value="<?= $data['nim'] ?>" readonly>
                        </div>
                        <div class="mb-">
                            <label class="form-label" for="">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" value="<?= $data['nama'] ?>">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan Anda" value="<?= $data['jurusan'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat.." value="<?= $data['alamat'] ?>">
                        </div>
                        <div class="mb-1">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Update</button>
                            <a href="index.php?page=mahasiswa" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>