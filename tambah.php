<?php
session_start();

require_once "models/insertBooks.php";
require_once "utils/parserInt.php";
require_once "utils/alert.php";
require_once "validations/validationForm.php";
require_once "helpers/inputSanitizer.php";
require_once "helpers/auth.php";

// Cek apakah user sudah login
if (!Logged_in_Helper()) {
    header("Location: login.php");
}

// jika tombol tambah di tekan 
if (isset($_POST["tombol-tambah"])) {
    $resultSanitizerInput = InputSanitize($_POST);

    $judulBook = $resultSanitizerInput["judul"];
    $kategoriBook = $resultSanitizerInput["kategori"];
    $ratingBook = $resultSanitizerInput["rating"];
    $isbnBook = $resultSanitizerInput["isbn"];
    $penulisBook = $resultSanitizerInput["penulis"];

    $resultRatingParse = ParseStrToInt($ratingBook);

    // validasi field forms tambah
    $validationForm = new ValidationForms($judulBook, $kategoriBook, $resultRatingParse, $isbnBook, $penulisBook);
    $validation = $validationForm->Validation();

    // jika form tidak ada error
    if (count($validation) == 0) {
        $resultInsertBook = InsertBook($judulBook, $kategoriBook, $resultRatingParse, $isbnBook, $penulisBook);
        $messages = [];
        $messages = $resultInsertBook == 0 ? ["message" => "Buku sudah terdaftar", "condition" => false] : ["message" => "Buku berhasil disimpan", "condition" => true];
    }
}

?>

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
                    <form class="col-sm-12 col-md-10 col-lg-6 border border-dark-subtle rounded p-4" method="post" action="">

                        <div class="mb-3">
                            <h2 class="fs-2 fw-normal">Tambah Buku</h2>
                            <?= (isset($messages["message"])) ? Alert($messages["message"], $messages["condition"]) : null; ?>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["judul"]) ? $validation["judul"] : null  ?></p>
                            <label for="inputJudulBuku" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJudulBuku" name="judul" maxlength="50" minlength="5" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["rating"]) ? $validation["rating"] : null  ?></p>
                            <label for="inputRating" class="col-sm-2 col-form-label">Rating</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="rating" inputmode="numeric" min="1" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["isbn"]) ? $validation["isbn"] : null  ?></p>
                            <label for="inputIsbn" class="col-sm-2 col-form-label">isbn</label>
                            <div class="col-sm-10">
                                <input type="text" name="isbn" class="form-control" id="inputIsbn" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["kategori"]) ? $validation["kategori"] : null  ?></p>
                            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputKategori" name="kategori" maxlength="50" minlength="5" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <p class="text-danger mt-2"><?= isset($validation["penulis"]) ? $validation["penulis"] : null  ?></p>
                            <label for="inputPenulis" class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPenulis" name="penulis" maxlength="100" />
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