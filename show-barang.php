<?php include 'header.php'; ?>
<div class="container">
    <h1 class="mt-4">Data Barang</h1>
    <hr>
    <a href="create-barang.php" class="btn btn-success mb-4">Tambah</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataMahasiswa">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $query = mysqli_query($con, "SELECT * FROM barang");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td><?php echo $data['gender']; ?></td>
                        <td><?php echo $data['tipe']; ?></td>
                        <td><?php echo $data['usia']; ?></td>
                        <td><?php echo $data['harga']; ?></td>
                        <td><img src="uploads/<?php echo $data['filenama']; ?>" width="150" height="auto"></td>

                        <td>
                            <a href="edit-barang.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-success">edit</a>
                            <a href="delete-barang.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Lanjutkan hapus data ?')">hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'footer.php'; ?>