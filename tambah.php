<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <script src="assets/js/bootstrap.bundle.js"></script>
</head>

<body>
    <main>
        <?php
        include_once "layouts/navbar.php";
        ?>

        <section class="container-fluid">

            <!-- HERO SECTION START -->
            <?php
            include "layouts/hero-section.php";
            ?>
            <!-- HERO SECTION END -->

            
            <!-- TAMBAH BUKU START -->
            <section class="container mt-5">
                <div class="row justify-content-center ">
                    <form class="col-sm-12 col-md-10 col-lg-6 border border-dark-subtle rounded p-4" method="post">

                        <div class="mb-5">
                            <h2 class="fs-2 fw-normal">Tambah Buku</h2>
                        </div>

                        <div class="row mb-3">
                            <label for="inputJudulBuku" class="col-sm-2 col-form-label">Judul Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJudulBuku" name="judul" maxlength="50" minlength="5" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputKategori" name="kategori" maxlength="50" minlength="5" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRating" class="col-sm-2 col-form-label">Rating</label>
                            <div class="col-sm-10">
                                <input type="number" name="rating" inputmode="numeric" min="1" max="100" style="appearance: none; -moz-appearance: none; -webkit-appearance: none;" pattern="[0-9]*" class="form-control" id="inputRating" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputIsbn" class="col-sm-2 col-form-label">isbn</label>
                            <div class="col-sm-10">
                                <input type="text" name="isbn" class="form-control" id="inputIsbn" minlength="13" maxlength="13" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPenulis" class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPenulis" name="penulis" maxlength="100" required />
                            </div>
                        </div>

                        <div class="row justify-content-end mt-5">
                            <div class="col-auto">
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="tombol-tambah" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- TAMBAH BUKU END -->

        </section>
    </main>
</body>

</html>