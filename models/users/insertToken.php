<?php

require_once "././db/koneksi.php";

/**
 * this function for save token to database
 **/

function InsertTokenUser(int $userID, string $token) {
    global $koneksiDB;

    $sqlInsertToken = "UPDATE tb_users SET cookieToken = '$token' WHERE id = '$userID'";
    mysqli_query($koneksiDB, $sqlInsertToken);

    return mysqli_affected_rows($koneksiDB);

    mysqli_close($koneksiDB);
}
