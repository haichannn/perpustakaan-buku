<?php

require_once "././db/koneksi.php";

/**
 * this function for register user
 * 
 * @return bool
 **/

function RegisterUser(string $usernameInput, string $passwordInput) 
{
    global $koneksiDB;

    $sqlRegisterUser = "INSERT INTO tb_users (username, password) VALUES 
                        ('$usernameInput', '$passwordInput')
                       ";
    mysqli_query($koneksiDB, $sqlRegisterUser);

    return mysqli_affected_rows($koneksiDB);

    mysqli_close($koneksiDB);
}

?>