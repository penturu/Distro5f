<?php
include 'connection.php';

$targetDir = "uploads/";

$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM barang WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $id = $data['id'];
    $nama = $data['nama'];
    $deskripsi = $data['deskripsi'];
    $gender = $data['gender'];
    $tipe = $data['tipe'];
    $usia = $data['usia'];
    $gambar = $data['filenama'];
}
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $gender = $_POST['gender'];
    $tipe = $_POST['tipe'];
    $usia = $_POST['usia'];

    if ($_FILES['gambar']['name']) {
        $fileName = basename($_FILES['gambar']['name']);
        $targetPath = $targetDir.$fileName;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetPath)) {
            $gambar = $fileName;
        }
    }

    $result = mysqli_query($con, "UPDATE barang SET 
    nama='$nama',deskripsi='$deskripsi',gender='$gender',tipe='$tipe',usia='$usia',filenama='$gambar', filepath ='$targetPath' WHERE id=$id");
    header('Location: show-barang.php');
}

?>

<?php include 'header.php' ?>
<div class="container">
    <h1 class="mt-4">Edit Data Barang</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="gender" class="col-sm-2 col-form-label">gender</label>
            <div class="col-sm-10">
                <select name="gender" id="gender" class="form-select">
                    <option value="-" disabled>- pilih gender -</option>
                    <option value="Pria" <?php if ($gender == 'Pria') echo 'selected' ?>>Pria</option>
                    <option value="Wanita" <?php if ($gender == 'Wanita') echo 'selected' ?>>Wanita</option>
                    <option value="Pria dan Wanita" <?php if ($gender == 'Pria dan Wanita') echo 'selected' ?>>Pria dan Wanita</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
            <div class="col-sm-10">
                <select name="tipe" id="tipe" class="form-select">
                    <option value="-" disabled>- pilih tipe -</option>
                    <option value="Atasan" <?php if ($tipe == 'Atasan') echo 'selected' ?>>Atasan</option>
                    <option value="Bawahan" <?php if ($tipe == 'Bawahan') echo 'selected' ?>>Bawahan</option>
                    <option value="Pakaian Dalam" <?php if ($tipe == 'Pakaian Dalam') echo 'selected' ?>>Pakaian Dalam</option>
                    <option value="Aksesoris" <?php if ($tipe == 'Aksesoris') echo 'selected' ?>>Aksesoris</option>
                    <option value="Lainnya" <?php if ($tipe == 'Lainnya') echo 'selected' ?>>Lainnya</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="usia" class="col-sm-2 col-form-label">Usia</label>
            <div class="col-sm-10">
                <select name="usia" id="usia" class="form-select">
                    <option value="-" disabled>- pilih usia -</option>
                    <option value="Bayi" <?php if ($usia == 'Bayi') echo 'selected' ?>>Bayi</option>
                    <option value="Anak-anak" <?php if ($usia == 'Anak-anak') echo 'selected' ?>>Anak-anak</option>
                    <option value="Remaja" <?php if ($usia == 'Remaja') echo 'selected' ?>>Remaja</option>
                    <option value="Dewasa" <?php if ($usia == 'Dewasa') echo 'selected' ?>>Dewasa</option>
                    <option value="Lanjut Usia" <?php if ($usia == 'Lanjut Usia') echo 'selected' ?>>Lanjut Usia</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <img src="uploads/<?php echo $gambar; ?>" width="150" height="150">
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
        </div>

        <div class="mb-12 row">
            <div class="offset-sm-2">
                <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                <input type="reset" value="Reset" class="btn btn-warning">
                <a href="show-barang.php" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
</div>
<?php include 'footer.php' ?>