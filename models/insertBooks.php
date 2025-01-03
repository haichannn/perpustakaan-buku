<?php

// import koneksi DB
require_once "./db/koneksi.php";
require_once "./utils/alert.php";

/**
 * undocumented function summary
 *
 * Undocumented function long description
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

    if ($jumlahRowIsbn > 0) {
        $ambilJudulBuku = mysqli_fetch_assoc($resultCheck)["judul"];
        echo Alert("ISBN sudah terdaftar, oleh buku: $ambilJudulBuku", false);
        
        return false;
    }

    $sqlInsertBook = "INSERT INTO tb_books (judul, kategori, rating, isbn, penulis) 
                      VALUES ('$judul', '$kategori', '$rating', '$isbn', '$penulis');
                     ";

    mysqli_query($koneksiDB, $sqlInsertBook);

    return mysqli_affected_rows($koneksiDB);

    mysqli_close($koneksiDB);
}
