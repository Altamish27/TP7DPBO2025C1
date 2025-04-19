<?php
require_once '../config/config.php';


class Genre {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fungsi untuk menambahkan genre
    public function create($name) {
        $sql = "INSERT INTO Genres (Name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name' => $name]);
    }

    // Fungsi untuk mendapatkan semua genre
    public function getAllGenres() {
        $sql = "SELECT * FROM Genres";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mendapatkan genre berdasarkan ID
    public function getGenreById($id) {
        $sql = "SELECT * FROM Genres WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk memperbarui genre
    public function update($id, $name) {
        $sql = "UPDATE Genres SET Name = :name WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name
        ]);
    }

    // Fungsi untuk menghapus genre
    public function delete($id) {
        $sql = "DELETE FROM Genres WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>
