<?php

// import koneksi DB
require_once "./db/koneksi.php";
require_once "./utils/alert.php";

/**
 * this function for insert book to database
 *
 * @param string $judul
 * @param string $kategori
 * @param int $rating
 * @param string $isbn
 * @param string $penulis
 * @return bool
 * 
 **/

function InsertBook($judul, $kategori, $rating, $isbn, $penulis)
{
    global $koneksiDB;

    // cek ISBN apakah sudah di daftar kan 
    $sqlCheckIsbn = "SELECT * FROM tb_books WHERE isbn = '$isbn'";
    $resultCheck = mysqli_query($koneksiDB, $sqlCheckIsbn);
    $jumlahRowIsbn = mysqli_num_rows($resultCheck);

    // Jika buku sudah terdaftar
    if ($jumlahRowIsbn > 0) {
        return false;
    }

    $sqlInsertBook = "INSERT INTO tb_books (judul, kategori, rating, isbn, penulis) 
                      VALUES ('$judul', '$kategori', '$rating', '$isbn', '$penulis');
                     ";

    mysqli_query($koneksiDB, $sqlInsertBook);
    return mysqli_affected_rows($koneksiDB);
    mysqli_close($koneksiDB);
}
