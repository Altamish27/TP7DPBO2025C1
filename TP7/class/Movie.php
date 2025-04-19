<?php
require_once '../config/config.php';


class Movie {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($title, $releaseYear, $genreId, $rating, $language, $description) {
        $sql = "INSERT INTO Movies (Title, Release_Year, Genre_ID, Rating, Language, Description) 
                VALUES (:title, :releaseYear, :genreId, :rating, :language, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':releaseYear' => $releaseYear,
            ':genreId' => $genreId,
            ':rating' => $rating,
            ':language' => $language,
            ':description' => $description
        ]);
    }

    public function getAllMovies() {
        $sql = "SELECT m.ID, m.Title, m.Release_Year, g.Name AS Genre, m.Rating, m.Language, m.Description
                FROM Movies m
                LEFT JOIN Genres g ON m.Genre_ID = g.ID";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getMovieById($id) {
        $sql = "SELECT * FROM Movies WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $releaseYear, $genreId, $rating, $language, $description) {
        $sql = "UPDATE Movies SET Title = :title, Release_Year = :releaseYear, Genre_ID = :genreId, 
                Rating = :rating, Language = :language, Description = :description WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':releaseYear' => $releaseYear,
            ':genreId' => $genreId,
            ':rating' => $rating,
            ':language' => $language,
            ':description' => $description
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM Movies WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function search($keyword) {
        $sql = "SELECT m.ID, m.Title, m.Release_Year, g.Name AS Genre, m.Rating, m.Language, m.Description
                FROM Movies m
                LEFT JOIN Genres g ON m.Genre_ID = g.ID
                WHERE m.Title LIKE :keyword";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
