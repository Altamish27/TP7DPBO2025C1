<?php
require_once '../config/config.php';


class Review {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fungsi untuk menambahkan review
    public function create($movieId, $userId, $rating, $review) {
        $sql = "INSERT INTO Reviews (Movie_ID, User_ID, Rating, Review) 
                VALUES (:movieId, :userId, :rating, :review)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':movieId' => $movieId,
            ':userId' => $userId,
            ':rating' => $rating,
            ':review' => $review
        ]);
    }

    // Fungsi untuk mendapatkan semua reviews untuk film tertentu
    public function getReviewsByMovie($movieId) {
        $sql = "SELECT * FROM Reviews WHERE Movie_ID = :movieId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':movieId' => $movieId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mendapatkan review berdasarkan ID
    public function getReviewById($reviewId) {
        $sql = "SELECT * FROM Reviews WHERE Review_ID = :reviewId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':reviewId' => $reviewId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk memperbarui review
    public function update($reviewId, $rating, $review) {
        $sql = "UPDATE Reviews SET Rating = :rating, Review = :review WHERE Review_ID = :reviewId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':reviewId' => $reviewId,
            ':rating' => $rating,
            ':review' => $review
        ]);
    }

    // Fungsi untuk menghapus review
    public function delete($reviewId) {
        $sql = "DELETE FROM Reviews WHERE Review_ID = :reviewId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':reviewId' => $reviewId]);
    }
}
?>
