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
    global $koneksiDB;
    $sqlGetAllBooks = 'SELECT * FROM tb_books';
    return mysqli_query($koneksiDB, $sqlGetAllBooks);
}


function GetBookById(int $idBook)
{
    global $koneksiDB;
    $sqlGetBookById = "SELECT * FROM tb_books WHERE id = $idBook";
    $resultSqlGetById = mysqli_query($koneksiDB, $sqlGetBookById);
    return  mysqli_fetch_assoc($resultSqlGetById);
}
