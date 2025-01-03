<?php

/**
 * This class for validation form such: tambah buku, edit buku.
 */


class ValidationForms
{
    private $judul;
    private $kategori;
    private $rating;
    private $isbn;
    private $penulis;


    public function __construct(string $judul, string $kategori, int $rating, string $isbn, string $penulis)
    {
        $this->judul = $judul;
        $this->kategori = $kategori;
        $this->rating = $rating;
        $this->isbn = $isbn;
        $this->penulis = $penulis;
    }

    function Validation(): array
    {
        $errors = [];

        if (empty($this->judul)) {
            $errors["judul"] = "*Judul dibutuhkan";
        }
        if (empty($this->kategori)) {
            $errors["kategori"] = "*Kategori dibutuhkan";
        }
        if (empty($this->rating)) {
            $errors["rating"] = "*Rating dibutuhkan";
        } else if ($this->rating > 101) {
            $errors["rating"] = "*Rating rentang antara 1-100";
        }

        if (empty($this->isbn) || !preg_match('/^\d{13}$/', $this->isbn)) {
            $errors["isbn"] = "*Isbn dibutuhkan dan berupa angka 13 digit";
        }

        if (empty($this->penulis)) {
            $errors["penulis"] = "*Penulis dibutuhkan";
        }

        return $errors;
    }
}
