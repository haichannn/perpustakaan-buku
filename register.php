<?php

require_once "helpers/inputSanitizer.php";
require_once "validations/authInput.php";
require_once "models/users/getUser.php";
require_once "models/users/registerUser.php";
require_once "utils/alert.php";
require_once "utils/hashPassword.php";

// Jika tombol daftar ditekan 
if (isset($_POST["tombol-daftar"])) {
    $sanitizeInput = InputSanitize($_POST);
    $usernameClean = $sanitizeInput["username"];
    $passwordClean = $sanitizeInput["password"];

    // validasi input username dan password
    $validationInput = new ValidationAuthForms($usernameClean, $passwordClean);
    $resultValidation = $validationInput->ValidationRegister();

    // jika validasi nya tidak error 
    if (count($resultValidation) == 0) {

        // Cari user berdasarkan username 
        $resultGetUsername = GetUserByUsername($usernameClean);

        // Jika username belum di dipakai
        if (is_null($resultGetUsername)) {

            $resultHashPassword = HashPasswordUtil($passwordClean);

            // masukan data user ke database
            $resultRegisterUser = RegisterUser($usernameClean, $resultHashPassword);

            // jika berhasil
            if ($resultRegisterUser == 1) {
                echo Alert("berhasil daftar :b, silakan login", true);
            } else {
                echo Alert("gagal daftar :(, silakan coba lagi", false);
            }
        } else {
            echo Alert("username sudah digunakan", false);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <script src="assets/js/bootstrap.bundle.js"></script>
</head>

<body style="background-color: #ddd">
    <main>
        <?php
        include "layouts/navbar.php"
        ?>


        <!-- Login form start -->
        <section class="container">
            <div class="row d-lg-flex align-items-center justify-content-center mx-1" style="height: 100vh;">
                <form style="background-color: #fff;" class="col-sm-12 col-md-10 col-lg-6 border border-dark-subtle rounded p-4" method="post">

                    <div class="mb-5">
                        <h2 class="text-lead text-center" style="font-family: 'Times New Roman', Times, serif; font-size: 2.3em;">Daftar </h2>
                        <p class="text-center text-lead">Selamat Datang</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-danger"><i><?= isset($validation["username"]) ? $validation["username"] : null  ?></i></p>
                        <label for="inputUsername" class="col-sm-2 col-form-label text-capitalize">username</label>
                        <div class="col-sm-10 w-100">
                            <input type="text" class="form-control" id="inputUsername" name="username" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="text-danger"><i><?= isset($validation["password"]) ? $validation["password"] : null  ?></i></p>
                        <label for="inputPassword" class="col-sm-2 col-form-label text-capitalize">password</label>
                        <div class="col-sm-10 w-100">
                            <input class="form-control" type="password" name="password" id="inputPassword" />
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="col-auto">
                            <button type="submit" name="tombol-daftar" class="btn btn-success w-100">Daftar</button>
                        </div>

                        <div class="col-auto mt-4">
                            <p class="text-lead text-center">
                                Atau sudah ada akun, silakan <a class="text-link" href="login.php">Login</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Login form end -->

    </main>
</body>

</html>