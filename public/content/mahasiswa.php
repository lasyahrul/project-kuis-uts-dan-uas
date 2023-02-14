<div class="row mt-2">
    <div class="col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                Form Input Mahasiswa
            </div>
            <div class="card-body">
                <form action="index.php?page=mahasiswa_save" method="POST">
                    <div class="mb-1">
                        <label class="form-label" for="">NIM</label>
                        <input type="text" name="nim" class="form-control" placeholder="Masukan NIM Anda">
                    </div>
                    <div class="mb-">
                        <label class="form-label" for="">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat..">
                    </div>
                    <div class="mb-1">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>JURUSAN</th>
                            <th>ALAMAT</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $con->query("SELECT * FROM mahasiswa");
                        while ($row = $sql->fetch()) {
                            echo "<tr>
                                    <td>$row[nim]</td>
                                    <td>$row[nama]</td>
                                    <td>$row[jurusan]</td>
                                    <td>$row[alamat]</td>
                                    <td>
                                        <a href='index.php?page=mahasiswa_edit&nim=$row[nim]' class='btn btn-sm btn-warning'>Edit</a>
                                        <a href='index.php?page=mahasiswa_delete&nim=$row[nim]' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Data?')\">Delete</a>
                                    </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>