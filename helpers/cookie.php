<?php

require_once "././models/users/insertToken.php";

/**
 * this function for save cookie
 *
 * save cookies on browser client and save to database
 *
 **/


function SaveCookies(int $userID, string $username)
{

    $dataToken = hash("sha256", $username);
    $expiresTimeCookies = time() + 60 * 60 * 24 * 7; // 1 minggu

    setcookie("idUser", $userID,  $expiresTimeCookies);
    setcookie("token", $dataToken,  $expiresTimeCookies);

    // simpan token ke database
    return InsertTokenUser($userID, $dataToken);
}
