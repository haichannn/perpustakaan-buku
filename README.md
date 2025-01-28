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

6. Buat Database (defaultnya: "perpustakaan-buku", bisa diganti di **koneksi.php**)
   > CREATE DATABASE perpustakaan-buku

7. Buat table "tb_books" dan ini structure table nya.
   > CREATE TABLE `namaTable` (
     `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
     `judul` varchar(50) NOT NULL, 
     `kategori` varchar(50) NOT NULL,
     `rating` tinyint(100) NOT NULL, 
     `isbn` char(13) NOT NULL UNIQUE KEY,
     `penulis` varchar(100) NOT NULL 
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 
     COLLATE=utf8mb4_general_ci;

8. Buat table "tb_users" dan ini struktur table nya
    > CREATE TABLE `tb_users` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `username` varchar(50) NOT NULL,
     `password` varchar(255) NOT NULL,
     `cookieToken` text DEFAULT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `username` (`username`)
      ) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

9. buka di browser
   > http://localhost/path-you/perpustakaan-buku
