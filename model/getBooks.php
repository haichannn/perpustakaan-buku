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
    $resultBooks = mysqli_query($koneksiDB, $sqlGetAllBooks);

    return $resultBooks;
}


function GetBookById(int $idBook)
{
    global $koneksiDB;
    $sqlGetBookById = "SELECT * FROM tb_books WHERE id = $idBook";
    $resultSqlGetById = mysqli_query($koneksiDB, $sqlGetBookById);
    $resultBook = mysqli_fetch_assoc($resultSqlGetById);

    return $resultBook;
 }
