<?php


require_once "./model/getBooks.php";

$ResultBooks = GetAllBooks();
$TotalBuku = mysqli_num_rows($ResultBooks);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/bootstrap.bundle.js"></script>
</head>

<body>
    <main>
        <?php
        include "layouts/navbar.php"
        ?>

        <!-- HERO SECTION START -->
        <?php
        include "layouts/hero-section.php";
        ?>
        <!-- HERO SECTION END -->

        <!-- ACTION BAR START -->
        <section class="container mt-5">
            <div class="row justify-content-around g-3">
                <div class="col-sm-12 col-md-7 order-sm-1 order-md-0 ">
                    <a href="tambah.php" class="btn btn-primary">+ Tambah</a>
                </div>
                <div class="col-sm-12 col-md-5 order-sm-0 order-md-1">
                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" type="search" placeholder="Cari Buku.." aria-label="Search">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- ACTION BAR END -->


        <!-- LIST BUKU START -->
        <section class="container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Isbn</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $idAwal = 1 ?>
                    <?php while ($data = mysqli_fetch_assoc($ResultBooks)) : ?>

                        <tr>
                            <th scope="row"><?= $idAwal ?></th>
                            <td><?= $data["judul"] ?></td>
                            <td><?= $data["kategori"] ?></td>
                            <td><?= $data["rating"] ?></td>
                            <td><?= $data["isbn"] ?></td>
                            <td><?= $data["penulis"] ?></td>
                            <td>
                                <div class="row justify-content-start">
                                    <div class="col-sm-auto">
                                        <a href="edit.php?id=<?= $data["id"] ?>" class="btn btn-warning">Edit</a>
                                    </div>
                                    <div class="col-sm-auto">
                                        <a href="hapus.php?id=<?= $data["id"] ?>" class="btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php $idAwal++ ?>

                    <?php endwhile ?>
                </tbody>
            </table>
        </section>
        <!-- LIST BUKU END -->


        <!-- DESCRIPTIONS TABLE START -->
        <section class="container">
            <p class="text-lead text-primary">Jumlah Total Buku: <?= $TotalBuku ?></p>
        </section>
        <!-- DESCRIPTIONS TABLE END  -->


    </main>
</body>

</html>