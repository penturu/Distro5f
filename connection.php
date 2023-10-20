<?php
$dbHost = "localhost";
$dbName = "distro5f";
$dbUsername = "root";
$dbPassword = "ashar123";
$con = mysqli_connect("$dbHost", "$dbUsername", "$dbPassword", "$dbName");
if (mysqli_connect_errno()) {
    echo "<h1>Koneksi database error : " . mysqli_connect_errno() . "</h1>";
}
