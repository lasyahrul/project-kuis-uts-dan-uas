<?php

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = $con->query("DELETE FROM user WHERE id=$id");
  $data = $sql->fetch();
  header("Location: index.php?page=user");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $level = $_POST['level'];

  $sql = $con->query("INSERT INTO user (username, password, level) VALUES ('$username', '$password', '$level')");
  header("Location: index.php?page=user");
}

?>

<div class="row mt-2">
    <div class="col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                Form Input User
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-1">
                        <label class="form-label" for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                    </div>
                    <div class="mb-">
                        <label class="form-label" for="">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="">Level</label>
                        <select name="level" class="form-select" id="">
                            <option>Admin</option>
                            <option>User</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-send"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header">
                Data User
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>USERNAME</th>
                            <th>LEVEL</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = $con->query("SELECT * FROM user");
                        while ($row = $sql->fetch()) {
                            echo "<tr>
                                    <td>$no</td>
                                    <td>$row[username]</td>
                                    <td>$row[level]</td>
                                    <td>
                                        <a href='index.php?page=user_edit&id=$row[id]' class='btn btn-sm btn-warning'>Edit</a>
                                        <a href='index.php?page=user&delete=$row[id]' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Data?')\">Delete</a>
                                    </td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>