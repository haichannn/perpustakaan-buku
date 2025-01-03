<?php

require_once "./db/koneksi.php";


function DeleteBook(int $id): int
{
    global $koneksiDB;

    $sqlDeleteBooks = "DELETE FROM tb_books WHERE id = $id";
    mysqli_query($koneksiDB, $sqlDeleteBooks);

    return mysqli_affected_rows($koneksiDB);

    mysqli_close($koneksiDB);
}
