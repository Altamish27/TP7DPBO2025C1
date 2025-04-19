<?php
require_once '../config/config.php';


class MovieActor {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Menambahkan actor ke movie
    public function addActorToMovie($movieId, $actorId, $role) {
        $sql = "INSERT INTO Movie_Actors (Movie_ID, Actor_ID, Role) 
                VALUES (:movieId, :actorId, :role)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':movieId' => $movieId,
            ':actorId' => $actorId,
            ':role' => $role
        ]);
    }

    // Mendapatkan semua actors berdasarkan movie ID
    public function getActorsByMovie($movieId) {
        $sql = "SELECT a.Name, ma.Role, a.ID AS Actor_ID FROM Movie_Actors ma
                JOIN Actors a ON ma.Actor_ID = a.ID
                WHERE ma.Movie_ID = :movieId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':movieId' => $movieId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan semua movies berdasarkan actor ID
    public function getMoviesByActor($actorId) {
        $sql = "SELECT m.Title, ma.Role, m.ID AS Movie_ID FROM Movie_Actors ma
                JOIN Movies m ON ma.Movie_ID = m.ID
                WHERE ma.Actor_ID = :actorId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':actorId' => $actorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menghapus relasi antara movie dan actor
    public function deleteActorFromMovie($movieId, $actorId) {
        $sql = "DELETE FROM Movie_Actors WHERE Movie_ID = :movieId AND Actor_ID = :actorId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':movieId' => $movieId, ':actorId' => $actorId]);
    }

    // Memperbarui role actor dalam movie
    public function updateActorRole($movieId, $actorId, $role) {
        $sql = "UPDATE Movie_Actors SET Role = :role WHERE Movie_ID = :movieId AND Actor_ID = :actorId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':movieId' => $movieId,
            ':actorId' => $actorId,
            ':role' => $role
        ]);
    }
}
?>
