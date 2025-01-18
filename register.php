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

<body style="background-color: #008F74;">
    <main>
        <?php
        include "layouts/navbar.php"
        ?>


        <!-- Login form start -->
        <section class="vh-100" >
            <section class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-4">
                                <form method="post">

                                    <div class="mb-5 text-center">
                                        <h3>Sign up</h3>
                                    </div>

                                    <div class="mb-4">
                                        <?php $hasErrorUsername = isset($resultValidation["username"]) ?>
                                        <p class="text-danger"><i><?= $hasErrorUsername ? $resultValidation["username"] : null  ?></i></p>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control <?= $hasErrorUsername ? 'is-invalid' : null ?>" name="username" placeholder="username" />
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <?php $hasErrorPassword = isset($resultValidation["password"]) ?>
                                        <p class="text-danger"><i><?= $hasErrorPassword ? $resultValidation["password"] : null  ?></i></p>
                                        <div class="col-sm-10 w-100">
                                            <input class="form-control <?= $hasErrorPassword ? 'is-invalid' : null ?>" type="password" name="password" placeholder="password" />
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
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!-- Login form end -->

    </main>
</body>

</html>