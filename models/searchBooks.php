<?php


include_once "./db/koneksi.php";

/**
 * this function for search books such judul, isbn and penulis
 * 
 * @return array
 * 
 **/

function SearchBooks(string $keywordSearch)
{
    global $koneksiDB;

    $sqlSearchBooks = " SELECT * FROM tb_books WHERE 
                        judul LIKE '%$keywordSearch%' OR
                        penulis LIKE '$keywordSearch%' OR
                        isbn LIKE '%$keywordSearch%' 
                      ";

    return mysqli_query($koneksiDB, $sqlSearchBooks);
    mysqli_close($koneksiDB);
}
