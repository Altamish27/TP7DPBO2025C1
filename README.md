# Movie Management System

## Deskripsi Proyek

Sistem ini adalah aplikasi PHP yang dirancang untuk mengelola Film, Aktor, Genre, dan Review. Sistem ini memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada Film, Aktor, Genre, dan Review. Selain itu, sistem ini dilengkapi dengan fitur pencarian untuk menemukan film berdasarkan judul atau aktor.

Relasi antar tabel juga diterapkan, di mana Film dapat memiliki banyak Aktor, dan setiap Film dikategorikan dalam Genre tertentu. Review juga dapat diberikan untuk setiap film, yang memungkinkan pengguna untuk memberikan rating dan komentar.

## Fitur

### CRUD untuk Film:
- Menambah, mengedit, menghapus, dan melihat data film.
- Film memiliki atribut seperti judul, tahun rilis, genre, rating, bahasa, dan deskripsi.

### CRUD untuk Aktor:
- Menambah, mengedit, menghapus, dan melihat data aktor yang terlibat dalam film.
- Setiap aktor memiliki atribut seperti nama, tanggal lahir, dan kewarganegaraan.

### CRUD untuk Genre:
- Menambah, mengedit, menghapus, dan melihat data genre film.
- Setiap genre hanya memiliki nama genre.

### CRUD untuk Review:
- Menambah, mengedit, menghapus, dan melihat review film.
- Review terdiri dari konten review dan rating.

### Pencarian Film:
- Fitur pencarian memungkinkan pengguna mencari film berdasarkan judul atau aktor.
- Hasil pencarian akan ditampilkan di bagian yang terpisah di bawah form pencarian.

## Relasi antar Tabel

- **Relasi antara Film dan Aktor (Many-to-Many):** Satu film dapat memiliki banyak aktor, dan satu aktor bisa bermain di banyak film.
- **Relasi antara Film dan Genre (One-to-Many):** Setiap film hanya dapat memiliki satu genre, tetapi satu genre bisa memiliki banyak film.


## Desain Sistem

### Struktur Folder:
- **Controllers**: Berisi file controller untuk mengelola operasi CRUD untuk Movies, Actors, Genres, dan Reviews.
- **Classes**: Berisi file class untuk setiap entitas yang terlibat (Movies, Actors, Genres).
- **Views**: Berisi file view untuk tampilan antarmuka pengguna, seperti form untuk menambah, mengedit, dan menghapus data Movies, Actors, Genres, dan Reviews.
- **Config**: Berisi file konfigurasi untuk mengatur koneksi ke database menggunakan PDO.

### Alur Sistem:
#### Halaman Utama (index.php):
- Menampilkan semua Movies, Actors, Genres, dan Reviews yang ada dalam database.
- Tabel Movies menampilkan data film dengan link Edit, Delete, dan Add Actor serta Add Review.
- Tabel Actors dan Genres menampilkan data yang sama dengan tindakan Edit dan Delete.
- Tabel Reviews menampilkan data terkait review film yang dapat diedit dan dihapus.

#### Pencarian Film:
- Form pencarian memungkinkan pengguna untuk mencari Film berdasarkan judul.
- Hasil pencarian akan muncul di bawah form pencarian di bagian kanan halaman.

#### Tambah, Edit, Hapus Data:
- Form Tambah digunakan untuk menambah data Film, Aktor, dan Genre.
- Form Edit memungkinkan pengguna untuk mengubah data yang ada.
- Tindakan Hapus akan menghapus data terkait dari database.

#### Relasi antara Movie dan Actor:
- Dalam sistem ini, hubungan antara Film dan Aktor dikelola melalui tabel Movie_Actor, yang menghubungkan Film dengan Aktor menggunakan movie_id dan actor_id.
- Di halaman Film, pengguna dapat menambah Aktor ke dalam film tertentu dan mengedit peran mereka.

#### Review Film:
- Setiap film dapat memiliki beberapa Review yang ditulis oleh pengguna.
- Review terdiri dari Rating dan Teks Review.
- Pengguna dapat menambah, mengedit, dan menghapus Review untuk setiap film.

#### Pencarian:
- Pengguna dapat mencari Film dengan judul melalui form pencarian.
- Setelah pencarian, hasilnya akan muncul di bawah form pencarian di bagian kanan dan memperbarui tampilan tanpa mengubah data film utama yang ada.

  ## Struktur Folder dan File
![image](https://github.com/user-attachments/assets/898d2138-89d6-4bda-aa50-74c700abd909)


https://github.com/user-attachments/assets/f157a30a-1aab-47ba-8fa2-4e9a0a4f127a


```plaintex
/movie_management_system
    /controllers
        MovieController.php       // Mengelola CRUD untuk film
        ActorController.php       // Mengelola CRUD untuk aktor
        GenreController.php       // Mengelola CRUD untuk genre
        MovieActorController.php  // Mengelola hubungan antara film dan aktor
        ReviewController.php      // Mengelola CRUD untuk review
    /classes
        Movie.php                 // Class untuk film
        Actor.php                 // Class untuk aktor
        Genre.php                 // Class untuk genre
        MovieActor.php            // Class untuk hubungan film dan aktor
        Review.php                // Class untuk review
    /views
        add_movie.php             // Form untuk menambah film
        add_actor.php             // Form untuk menambah aktor
        add_genre.php             // Form untuk menambah genre
        add_review.php            // Form untuk menambah review
        edit_movie.php            // Form untuk mengedit film
        edit_actor.php            // Form untuk mengedit aktor
        edit_genre.php            // Form untuk mengedit genre
        edit_review.php           // Form untuk mengedit review
        delete_movie.php          // Hapus film
        delete_actor.php          // Hapus aktor
        delete_genre.php          // Hapus genre
        delete_review.php         // Hapus review
        index.php                 // Halaman utama untuk menampilkan semua data
    /config
        config.php               // Pengaturan koneksi database
    movie_db.sql                 // Struktur database


