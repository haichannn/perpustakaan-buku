<?php

require_once "././db/koneksi.php";

/**
 * this function for get user by username
 *
 * @return null|array
 **/

function GetUserByUsername(string $usernameInput)
{
    global $koneksiDB;

    $sqlGetUserByUsername = "SELECT * FROM tb_users WHERE username = '$usernameInput'";
    $resultSql = mysqli_query($koneksiDB, $sqlGetUserByUsername);
    $resultRows = mysqli_fetch_assoc($resultSql);
    return $resultRows;

    mysqli_close($koneksiDB);

}

?>