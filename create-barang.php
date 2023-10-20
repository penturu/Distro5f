<?php
include 'connection.php';

$targetDir = "uploads/";

if (isset($_POST['Submit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $gender = $_POST['gender'];
    $tipe = $_POST['tipe'];
    $usia = $_POST['usia'];
    $harga = $_POST['harga'];


    $fileName = basename($_FILES['file']['name']);
    $targetPath = $targetDir.$fileName;

    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

    $result = mysqli_query($con, "INSERT INTO barang (nama, deskripsi, gender, tipe, usia, harga, filenama, filepath) VALUES('$nama','$deskripsi','$gender','$tipe','$usia','$harga','$fileName','$targetPath')");
    header('location:show-barang.php');
}
    
?>
<?php include 'header.php'; ?>
<div class="container">
    <h1 class="mt-4">Tambah Data Barang</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" name="id" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select name="gender" id="gender" class="form-select">
                    <option value="-">- pilih gender -</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                    <option value="Pria dan Wanita">Pria dan Wanita</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
            <div class="col-sm-10">
                <select name="tipe" id="tipe" class="form-select">
                    <option value="-">- pilih tipe -</option>
                    <option value="Atasan">Atasan</option>
                    <option value="Bawahan">Bawahan</option>
                    <option value="Pakaian Dalam">Pakaian Dalam</option>
                    <option value="Aksesoris">Aksesoris</option>
                    <option value="Alas Kaki">Alas Kaki</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="usia" class="col-sm-2 col-form-label">Usia</label>
            <div class="col-sm-10">
                <select name="usia" id="usia" class="form-select">
                    <option value="-">- pilih usia -</option>
                    <option value="Bayi">Bayi</option>
                    <option value="Anak-anak">Anak-anak</option>
                    <option value="Remaja">Remaja</option>
                    <option value="Dewasa">Dewasa</option>
                    <option value="Lanjut Usia">Lanjut Usia</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="file" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="file">
            </div>
        </div>
        <div class="mb-12 row">
            <div class="offset-sm-2">
                <input type="submit" name="Submit" value="Simpan" class="btn btn-success">
                <input type="reset" value="Reset" class="btn btn-warning">
                <a href="show-barang.php" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
</div>
<?php include 'footer.php' ?>