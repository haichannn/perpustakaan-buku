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
    $result = mysqli_query($koneksiDB, $sqlGetAllBooks);
    mysqli_close($koneksiDB);

    return $result;
}


function GetBookById(int $idBook)
{
    global $koneksiDB;
    $sqlGetBookById = "SELECT * FROM tb_books WHERE id = $idBook";
    $resultSqlGet = mysqli_query($koneksiDB, $sqlGetBookById);
    $resultBook = mysqli_fetch_assoc($resultSqlGet);

    return $resultBook;
 }
