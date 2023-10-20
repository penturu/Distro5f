<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($con, "SELECT filenama FROM barang WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    $gambar = $data['filenama'];

    $deleteQuery = mysqli_query($con, "DELETE FROM barang WHERE id = $id");

    if ($deleteQuery) {
        $imagePath = 'uploads/' . $gambar;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        
        header('Location: show-barang.php');
    } else {
        echo "Failed to delete the record.";
    }
} else {
    echo "Invalid request.";
}
?>