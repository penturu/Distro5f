<?php
include 'connection.php';
if (isset($_POST['Submit'])) {
    $id = $_POST['id'];
    $user = $_POST['user'];
    $passwordUser = $_POST['passwordUser'];
    $alamat = $_POST['alamat'];
    $nomorWa = $_POST['nomorWa'];
    $status = $_POST['statusUser'];
    $result = mysqli_query($con, "INSERT INTO
user (user, pass, alamat, no_wa, status_user)
VALUES('$user','$passwordUser','$alamat','$nomorWa','$status')");
    header('location:show-user.php');
}
?>
<?php include 'header.php'; ?>
<div class="container">
    <h1 class="mt-4">Tambah Data User</h1>
    <hr>
    <form action="" method="post">
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" name="id" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label">User</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="user" name="user">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="passwordUser" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="passwordUser" name="passwordUser">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomorWa" class="col-sm-2 col-form-label">Nomor WA</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nomorWa" name="nomorWa">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="statusUser" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select name="statusUser" id="statusUser" class="form-select">
                    <option value="-">- pilih status user -</option>
                    <option value="Owner">Pemilik</option>
                    <option value="Karyawan">Karyawan</option>
                    <option value="Pembeli">Pembeli</option>
                </select>
            </div>
        </div>
        <div class="mb-12 row">
            <div class="offset-sm-2">
                <input type="submit" name="Submit" value="Simpan" class="btn btn-success">
                <input type="reset" value="Reset" class="btn btn-warning">
                <a href="show-user.php" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
</div>
<?php include 'footer.php' ?>