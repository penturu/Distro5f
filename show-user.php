<?php include 'header.php'; ?>
<div class="container">
    <h1 class="mt-4">Data User</h1>
    <hr>
    <a href="create-user.php" class="btn btn-success mb-4">Tambah</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataMahasiswa">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User</th>
                    <th scope="col">Password</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor WA</th>
                    <th scope="col">Status User</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $query = mysqli_query($con, "SELECT * FROM user");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['user']; ?></td>
                        <td><?php echo $data['pass']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['no_wa']; ?></td>
                        <td><?php echo $data['status_user']; ?></td>
                        <td>
                            <a href="edit-user.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-success">edit</a>
                            <a href="delete-user.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Lanjutkan hapus data ?')">hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'footer.php'; ?>