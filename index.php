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
        <section class="container mt-3">
            <h2 class="text-center display-3">Perpustakaan</h2>
        </section>
        <!-- HERO SECTION END -->

        <!-- ACTION BAR START -->
        <section class="container mt-5">
            <div class="row justify-content-around g-3">
                <div class="col-sm-12 col-md-7 order-sm-1 order-md-0 ">
                    <button class="btn btn-primary">+ Tambah</button>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Informatika XI</td>
                        <td>Komputer</td>
                        <td>81</td>
                        <td>123-312-43-1331-1</td>
                        <td>@Wildan Aprizal Arifin</td>
                        <td>
                            <div class="row justify-content-start">
                                <div class="col-sm-auto">
                                    <button class="btn btn-warning">Edit</button>
                                </div>
                                <div class="col-sm-auto">
                                    <a href="delete.php?id=1" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jadi Mahasiswa Kaya kenapa tidak</td>
                        <td>school</td>
                        <td>90</td>
                        <td>123-112-1234-43-1</td>
                        <td>H. Heppy Trenggono</td>
                        <td>
                            <div class="row justify-content-start">
                                <div class="col-sm-auto">
                                    <button class="btn btn-warning">Edit</button>
                                </div>
                                <div class="col-sm-auto">
                                    <a href="delete.php?id=1" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Sehat & Cerdas Untuk Remaja</td>
                        <td>psikologis</td>
                        <td>85</td>
                        <td>975-141-1431-13-1</td>
                        <td>Yohanes Sunardi</td>
                        <td>
                            <div class="row justify-content-start">
                                <div class="col-sm-auto">
                                    <button class="btn btn-warning">Edit</button>
                                </div>
                                <div class="col-sm-auto">
                                    <a href="delete.php?id=1" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <!-- LIST BUKU END -->


        <!-- DESCRIPTIONS TABLE START -->
        <section class="container">
            <p class="text-lead text-primary">Jumlah Total Buku: 3</p>
        </section>
        <!-- DESCRIPTIONS TABLE END  -->


    </main>
</body>

</html>