# perpustakaan-buku

## pengenalan

Project membuat perpustakaan buku berbasis CRUD (Create, Read, Update dan
Delete).

jadi aplikasi ini bisa meng-input data buku dari form seperti tambah & edit,
kemudian data buku tersebut akan di tampilkan page utama, dan juga bisa
menghapus data buku tersebut. lalu ada fitur cari buku sehingga gampang cari
bukunya.

project ini juga hasil belajar dari materi PHP dasar, dari playlist Channel
**WebProgrammingUnpas** atau pak **Sandhika Galih**.

## Installasi

1. Install Database **MySQL** dan WebServer **Apache2** atau **xampp**

2. Install PHP, (kalau sudah pakai xampp tidak perlu)

3. Install code editor:

   - Visual Studio Code (**recommended**).
   - Sublime text.
   - Atom.

4. Clone Repo nya Dan Taruh di folder htdocs (**xampp**).

5. Buka mysql prompt nya di terminal atau CMD

   > mysql -u USERNAME -p PASSWORD

6. Buat Database (defaultnya: "perpustakaan-buku", bisa diganti di
   **koneksi.php**)

   > CREATE DATABASE namaDatabase

7. Buat table (defaultnya: "tb_books", bisa diganti di **koneksi.php**) dan ini
   structure table nya.

   > CREATE TABLE `namaTable` ( `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `judul` varchar(50) NOT
   > NULL, `kategori` varchar(50) NOT NULL, `rating` tinyint(100) NOT NULL,
   > `isbn` char(13) NOT NULL UNIQUE KEY, `penulis` varchar(100) NOT NULL ) ENGINE=InnoDB
   > DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

8. buka di browser
   > http://localhost/namaProject
