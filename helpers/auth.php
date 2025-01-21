<?php

require_once "././models/users/getUser.php";
require_once "././utils/parserInt.php";

function Logged_in_Helper()
{
    $logged_in = (isset($_SESSION["logged_in"])) ? true : false;

    // Jika user belum login dan tidak ada session
    if (!$logged_in && !$logged_in === true) {
        return false;
    }

    return true;
}

// this function for check cookie
function CheckCookieHelper()
{
    if (isset($_COOKIE["idUser"]) && isset($_COOKIE["token"])) {
        $resultParseId = ParseStrToInt($_COOKIE["idUser"]);
        $resultGetUserById = GetUserById($resultParseId);


        // jika id user tidak ditemukan
        if (is_null($resultGetUserById)) {
            session_start();
            session_destroy();
            setcookie("idUser", "", time() - 24 * 24 * 60 * 1);
            setcookie("token", "", time() - 24 * 24 * 60 * 1);
            header("Location: login.php");
            exit;
        }

        // kita samakan cookie token tesebut dengan di database 
        if ($_COOKIE["token"] === $resultGetUserById["cookieToken"]) {
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $resultGetUserById["username"];
            $_SESSION["id"] = $resultGetUserById["id"];
        } else {
            // jika user nakal ingin mengganti cookie token nya dengan tidak valid
            session_start();
            session_destroy();
            setcookie("idUser", "", time() - 24 * 24 * 60 * 1);
            setcookie("token", "", time() - 24 * 24 * 60 * 1);
            header("Location: login.php");
            exit;
        }
    }
}