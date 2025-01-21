<?php
session_start();

require_once "helpers/inputSanitizer.php";
require_once "validations/authInput.php";
require_once "models/users/getUser.php";
require_once "utils/verifyPassword.php";
require_once "utils/alert.php";
require_once "helpers/auth.php";
require_once "helpers/cookie.php";
require_once "utils/parserInt.php";

// Cek cookie 
CheckCookieHelper();

// Cek apakah user sudah login
if (Logged_in_Helper()) {
    header("Location: index.php");
}

$messagesErrors = null;

if (isset($_POST["tombol-login"])) {
    $sanitizeInput = InputSanitize($_POST);
    $usernameClean = $sanitizeInput["username"];
    $passwordClean = $sanitizeInput["password"];
    $rememberClean = (isset($_POST["tombol-remember"])) ? true : false;

    // validasi input 
    $validationInput = new ValidationAuthForms($usernameClean, $passwordClean);
    $resultValidation = $validationInput->ValidationLogin();

    // jika tidak ada error dari validasi
    if (count($resultValidation) == 0) {

        // CARI USERNAME
        $getUserByUsername = GetUserByUsername($usernameClean);

        // jika username tidak ditemukan
        if (is_null($getUserByUsername)) {
            $messagesErrors = "username atau password salah";
        } else {

            // COMPARE PASSWORD 
            $passwordFromDb = $getUserByUsername["password"];
            $resultVerifyPassword = VerifyPassword($passwordClean, $passwordFromDb);

            if (!$resultVerifyPassword) {
                $messagesErrors = "username atau password salah";
            } else {

                // BUAT SESSION 
                $_SESSION["logged_in"] = true;
                $_SESSION["username"] = $getUserByUsername["username"];
                $_SESSION["id"] = $getUserByUsername["id"];

                // JIKA REMEMBER DI TEKAN, BUAT COOKIE DAN DISIMPAN DI Database
                if ($rememberClean) {
                    $parseId = ParseStrToInt($getUserByUsername["id"]);
                    SaveCookies($parseId, $getUserByUsername["username"]);
                }

                header("Location: index.php");
            }
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
    <title>Sign in</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <script src="assets/js/bootstrap.bundle.js"></script>
</head>

<body style="background-color: #508bfc;">
    <main>
        <?php
        include_once "layouts/navbar.php";
        ?>

        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-4">
                                <h3 class="mb-5 fs-1">Sign in</h3>

                                <?= (isset($messagesErrors)) ? Alert($messagesErrors, false) : null ?>

                                <form method="post">
                                    <div data-mdb-input-init class="form-outline mb-4">

                                        <!-- Jika ada error di field username -->
                                        <?php $hasErrorUsername = isset($resultValidation["username"]) ?>
                                        <p class="text-danger"><i><?= $hasErrorUsername ? $resultValidation["username"] : null  ?></i></p>

                                        <div class="input-group">
                                            <span class="input-group-text rounded-start" id="icon-at">@</span>
                                            <div class="form-floating">
                                                <input type="text" class="form-control form-control-lg <?= $hasErrorUsername ? 'is-invalid' : null ?>" id="floatingUsername" placeholder="usernameInput" name="username" aria-describedby="basic-addon1" />
                                                <label for="floatingUsername">Username</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">

                                        <!-- Jika ada error di field password -->
                                        <?php $hasErrorPassword = isset($resultValidation["password"]) ?>
                                        <p class="text-danger"><i><?= $hasErrorPassword ? $resultValidation["password"] : null  ?></i></p>

                                        <div class="input-group">
                                            <span class="input-group-text rounded-start" id="icon-lock"> 🔒 </span>
                                            <div class="form-floating">
                                                <input type="password" class="form-control form-control-lg <?= $hasErrorPassword ? 'is-invalid' : null ?>" id="floatingPassword" placeholder="password" name="password" aria-describedby="icon-lock">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" d-flex justify-content-between mb-4">

                                        <!-- Checkbox -->
                                        <div class="form-check justify-content-start">
                                            <input class="form-check-input" type="checkbox" value="" name="tombol-remember" />
                                            <label class="form-check-label" for="form1Example3">Remember password </label>
                                        </div>

                                        <!-- forgot password -->
                                        <div>
                                            <a href="forgotPassowrd">Lupa password</a>
                                        </div>
                                    </div>

                                    <div>
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block w-100" type="submit" name="tombol-login">Login</button>
                                    </div>

                                    <div class="col-auto mt-4">
                                        <p class="text-lead text-center">
                                            Belum punya akun silakan, <a href="register.php">Sign up</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>