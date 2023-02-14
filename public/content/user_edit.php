<?php
$id = @$_GET['id'];
$sql = $con->query("SELECT * FROM user WHERE id=$id");
$data = $sql->fetch();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $sql = $con->query("UPDATE user SET username='$username', password='$password', level='$level' WHERE id=$id");
  header("Location: index.php?page=user");
}

?>

<div class="row mt-2">
  <div class="col-12 mx-auto">
    <div class="card">
      <div class="card-header">
        Form Edit User
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="mb-1">
            <label class="form-label" for="">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $data['username'] ?>" placeholder="Masukan Username" required>
          </div>
          <div class="mb-">
            <label class="form-label" for="">Password</label>
            <input type="text" name="password" class="form-control" placeholder="Masukan Password" required>
          </div>
          <div class="mb-1">
            <label class="form-label" for="">Level</label>
            <select name="level" class="form-select" id="">
              <option <?php if($data['level'] == 'Admin') echo 'selected' ?>>Admin</option>
              <option <?php if($data['level'] == 'User') echo 'selected' ?>>User</option>
            </select>
          </div>
          <div class="mb-1">
            <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-send"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>