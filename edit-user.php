<?php
include 'connection.php';
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM user WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $id = $data['id'];
    $user = $data['user'];
    $passwordUser = $data['pass'];
    $alamat = $data['alamat'];
    $nomorWa = $data['no_wa'];
    $statusUser = $data['status_user'];
}
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $passwordUser = $_POST['passwordUser'];
    $alamat = $_POST['alamat'];
    $nomorWa = $_POST['nomorWa'];
    $statusUser = $_POST['statusUser'];
    $result = mysqli_query($con, "UPDATE user SET 
    user='$user',pass='$passwordUser',alamat='$alamat',no_wa='$nomorWa',status_user='$statusUser' WHERE id=$id");
    header('Location:show-user.php');
}
?>

<?php include 'header.php' ?>
<div class="container">
    <h1 class="mt-4">Edit Data User</h1>
    <hr>
    <form action="" method="post">
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label">User</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="user" name="user" value="<?php echo $user; ?>">
            </div>
        </div><div class="mb-3 row">
            <label for="passwordUser" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="passwordUser" name="passwordUser" value="<?php echo $passwordUser; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomorWa" class="col-sm-2 col-form-label">Nomor WA</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nomorWa" name="nomorWa" value="<?php echo $nomorWa; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="statusUser" class="col-sm-2 col-form-label">Status User</label>
            <div class="col-sm-10">
                <select name="statusUser" id="statusUser" class="form-select">
                    <option value="-" disabled>- pilih status user -</option>
                    <option value="Owner" <?php if ($statusUser == 'Owner') echo 'selected' ?>>Pemilik</option>
                    <option value="Karyawan" <?php if ($statusUser == 'Karyawan') echo 'selected' ?>>Karyawan</option>
                    <option value="Pembeli" <?php if ($statusUser == 'Pembeli') echo 'selected' ?>>Pembeli</option>
                </select>
            </div>
        </div>

        <div class="mb-12 row">
            <div class="offset-sm-2">
                <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                <input type="reset" value="Reset" class="btn btn-warning">
                <a href="show-user.php" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
</div>
<?php include 'footer.php' ?>