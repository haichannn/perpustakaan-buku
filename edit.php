<?php

require_once "model/getBooks.php";
require_once "model/updateBooks.php";
require_once "validation/validationForm.php";
require_once "util/parserInt.php";


// ambil id di param
$idBukuRaw = (isset($_GET["id"])) ? htmlspecialchars($_GET["id"]) : null;


if (is_null($idBukuRaw)) {
    header("Location: index.php");
    die();
}

$idBuku = ParseStrToInt($idBukuRaw);

// jika user input id ber-value STRING dan tidak ber-value INT
if ($idBuku == 0) {
    header("Location: index.php");
    die();
}

// Cari buku berdasarkan id
$resultGetBook = GetBookById($idBuku);

if (is_null($resultGetBook)) {
    header("Location: index.php");
    die();
}


// jika tombol edit di tekan
if (isset($_POST["tombol-edit"])) {
    $judulBook = trim(htmlspecialchars($_POST["judul"]));
    $kategoriBook = trim(htmlspecialchars($_POST["kategori"]));
    $ratingBook = trim(htmlspecialchars($_POST["rating"]));
    $isbnBook = trim(htmlspecialchars($_POST["isbn"]));
    $penulisBook = trim(htmlspecialchars($_POST["penulis"]));

    $resultRatingParse = ParseStrToInt($ratingBook);

    // validasi field forms edit
    $validationForm = new ValidationForms($judulBook, $kategoriBook, $resultRatingParse, $isbnBook, $penulisBook);
    $validation = $validationForm->Validation();


    // jika validasi form tidak ada error
    if (count($validation) == 0) {
        $resultUpdateBook = UpdateBook($judulBook, $kategoriBook, $ratingBook, $isbnBook, $penulisBook, $idBuku);

        // jika update buku berhasil 
        if ($resultUpdateBook == 1) {
            echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Buku berhasil di edit
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';

            echo "
                    <script>
                        setTimeout(() => {
                            document.location.href = 'edit.php?id=$idBuku';
                        }, 1200);
                    </script>
                ";
            
        } else {
            echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Buku gagal di edit
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Edit Buku | <?= $resultGetBook["judul"] ?></title>
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


            <!-- EDIT BUKU START -->
            <section class="container mt-5">
                <div class="row justify-content-center ">
                    <form class="col-sm-10 col-md-8 col-lg-6 border border-dark-subtle rounded p-4" method="post" action="" id="form-edit">

                        <div class="mb-4 ">
                            <h2 class="fs-2 fw-normal">Mengedit Buku</h2>
                            <p class="text-lead"><i>"<?= $resultGetBook["judul"] ?>"</i></p>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["judul"]) ? $validation["judul"] : null  ?></p>
                            <label for="inputJudulBuku" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJudulBuku" name="judul" maxlength="50" minlength="5" value="<?= $resultGetBook["judul"] ?>" />
                            </div>
                        </div>


                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["rating"]) ? $validation["rating"] : null  ?></p>
                            <label for="inputRating" class="col-sm-2 col-form-label">Rating</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="rating" inputmode="numeric" min="1" value="<?= $resultGetBook["rating"] ?>" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["isbn"]) ? $validation["isbn"] : null  ?></p>
                            <label for="inputIsbn" class="col-sm-2 col-form-label">isbn</label>
                            <div class="col-sm-10">
                                <input type="text" name="isbn" class="form-control" id="inputIsbn" value="<?= $resultGetBook["isbn"] ?>" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["kategori"]) ? $validation["kategori"] : null  ?></p>
                            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputKategori" name="kategori" maxlength="50" minlength="5" value="<?= $resultGetBook["kategori"] ?>" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["penulis"]) ? $validation["penulis"] : null  ?></p>
                            <label for="inputPenulis" class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPenulis" name="penulis" maxlength="100" value="<?= $resultGetBook["penulis"] ?>" />
                            </div>
                        </div>

                        <div class="row justify-content-end mt-5">
                            <div class="col-auto">
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="tombol-edit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- EDIT BUKU END -->

        </section>
    </main>
</body>

</html>