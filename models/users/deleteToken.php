<?php

require_once "././db/koneksi.php";

function DeleteTokenUser(int $userID)
{
    global $koneksiDB;
    $sqlDeleteToken = "UPDATE tb_users SET cookieToken = NULL WHERE id = $userID";
    mysqli_query($koneksiDB, $sqlDeleteToken);
    return mysqli_affected_rows($koneksiDB);

    mysqli_close($koneksiDB);
}
