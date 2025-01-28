<?php
session_start();

require_once "models/users/deleteToken.php";
require_once "helpers/auth.php";


// Cek session 
if (!Logged_in_Helper()) {
    header("Location: login.php");
    exit;
}

// hapus session 
session_destroy();
session_unset();

// jika ada cookie, hapus cookie;
if (isset($_COOKIE["idUser"])) {
    $idUserCookie = $_COOKIE["idUser"];
    DeleteTokenUser($idUserCookie);
    setcookie("idUser", "", time() - 24*24*60*1);
    setcookie("token", "", time() - 24*24*60*1);
}

header("Location: login.php");

?>