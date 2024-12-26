<?php

$hostname = "localhost";
$username = "root";
$password = "root";
$dbName = "perpustakaan_buku";

$koneksiDB = mysqli_connect($hostname, $username, $password, $dbName);

if (mysqli_error($koneksiDB)) {
    echo "Tidak bisa terhubung ke database server !";
    die();
}

?>