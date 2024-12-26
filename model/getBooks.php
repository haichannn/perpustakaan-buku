<?php


require_once "./db/koneksi.php";


/**
 * this function for get all data books
 * 
 * @return array
 *
 **/
function GetAllBooks()
{
    $sqlGetAllBooks = 'SELECT * FROM tb_books';
    $result = mysqli_query($GLOBALS['koneksiDB'], $sqlGetAllBooks);
    mysqli_close($GLOBALS["koneksiDB"]);
    
    return $result;
}


