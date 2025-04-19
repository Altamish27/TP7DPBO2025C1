<?php
require_once '../class/Review.php';

class ReviewController {
    private $review;

    public function __construct($pdo) {
        $this->review = new Review($pdo);
    }

    public function create($movieId, $userId, $rating, $review) {
        $this->review->create($movieId, $userId, $rating, $review);
    }

    public function getReviewsByMovie($movieId) {
        return $this->review->getReviewsByMovie($movieId);
    }

    public function getReviewById($reviewId) {
        return $this->review->getReviewById($reviewId);
    }

    public function update($reviewId, $rating, $review) {
        $this->review->update($reviewId, $rating, $review);
    }

    public function delete($reviewId) {
        $this->review->delete($reviewId);
    }
}
?>
