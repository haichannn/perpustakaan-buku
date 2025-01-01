<?php

require_once "./db/koneksi.php";


/**
 * this function for edit book
 *
 * @param string judul
 * @param string kategori
 * @param int rating
 * @param string isbn
 * @param string penulis
 * @param int idBook
 * 
 **/

function UpdateBook($judul, $kategori, $rating, $isbn, $penulis, $idBook) 
{
    global $koneksiDB;
    $sqlUpdateBook = "UPDATE tb_books SET 
        judul='$judul',
        kategori='$kategori',
        rating='$rating',
        isbn='$isbn',
        penulis='$penulis' 
    WHERE id = $idBook";

    mysqli_query($koneksiDB, $sqlUpdateBook);

    return mysqli_affected_rows($koneksiDB);

    mysqli_close($koneksiDB);
}
