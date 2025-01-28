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
    $timeExpires = 60 * 60 * 24 * 7; // 1 minggu
    $expiresTimeCookie = time() + $timeExpires; 

    setcookie("idUser", $userID,  $expiresTimeCookie);
    setcookie("token", $dataToken,  $expiresTimeCookie);

    // simpan token ke database
    return InsertTokenUser($userID, $dataToken);
}
