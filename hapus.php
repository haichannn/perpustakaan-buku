<?php
session_start();

require_once "models/deleteBooks.php";
require_once "models/getBooks.php";
require_once "utils/parserInt.php";
require_once "utils/alert.php";
require_once "helpers/inputSanitizer.php";
require_once "helpers/auth.php";


// Cek apakah user sudah login
if (!Logged_in_Helper()) {
    header("Location: login.php");
}

$idBukuRaw = (isset($_GET["id"])) ? InputSanitize($_GET)["id"] : null;

if (is_null($idBukuRaw)) {
    header("Location: index.php");
    return false;
}

$idBuku = ParseStrToInt($idBukuRaw);

// jika user input id ber-value STRING dan tidak ber-value INT
if ($idBuku == 0) {
    header("Location: index.php");
    return false;
}

// Cari buku berdasarkan id
$resultGetBook = GetBookById($idBuku);


// jika tombol hapus ditekan
if (isset($_POST["tombol-hapus"])) {
    $resultDelete = DeleteBook($idBuku);

    if ($resultDelete > 0) {
        echo Alert("Data Buku Berhasil di hapus", true);
        echo "
                <script> 
                    setTimeout(() => {
                        document.location.href = 'index.php';
                    }, 700);
                </script>
             ";
    } else {
        echo Alert("Buku tidak ditemukan, gagal dihapus", false);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hapus Buku | <?= $resultGetBook["judul"] ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/bootstrap.bundle.js"></script>
</head>

<body>

    <section class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card text-center">
                    <div class="card-header">
                        Hapus Buku
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-danger">Berbahaya</h5>
                        <p class="card-text">
                            Apakah anda yakin untuk menghapus buku: <br>
                            <i>"<?= (isset($resultGetBook["judul"])) ? $resultGetBook["judul"] : null  ?>"</i>
                        </p>

                        <form method="post">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                                </div>
                                <div class="col-auto">
                                    <button name="tombol-hapus" class="btn btn-outline-danger">Hapus</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>