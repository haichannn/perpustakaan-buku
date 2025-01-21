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
    
    $sqlGetUserByUsername = "SELECT id, username, password FROM tb_users WHERE username = '$usernameInput'";
    $resultSql = mysqli_query($koneksiDB, $sqlGetUserByUsername);
    $resultRows = mysqli_fetch_assoc($resultSql);
    return $resultRows;
    
    mysqli_close($koneksiDB);

}

/**
 * this function for get user by id
 *
 * @return null|array
 **/

function GetUserById(int $userID)
{
    global $koneksiDB;

    $sqlGetUserById = "SELECT id, username, cookieToken FROM tb_users WHERE id = $userID";
    $resultSql = mysqli_query($koneksiDB, $sqlGetUserById);
    $resultRows = mysqli_fetch_assoc($resultSql);
    return $resultRows;

    mysqli_close($koneksiDB);

}
