<?php
require_once '../class/Movie.php';

class MovieController {
    private $movie;

    public function __construct($pdo) {
        $this->movie = new Movie($pdo);
    }

    public function create($title, $releaseYear, $genreId, $rating, $language, $description) {
        $this->movie->create($title, $releaseYear, $genreId, $rating, $language, $description);
    }

    public function getAllMovies() {
        return $this->movie->getAllMovies();
    }

    public function getMovieById($id) {
        return $this->movie->getMovieById($id);
    }

    public function update($id, $title, $releaseYear, $genreId, $rating, $language, $description) {
        $this->movie->update($id, $title, $releaseYear, $genreId, $rating, $language, $description);
    }

    public function delete($id) {
        $this->movie->delete($id);
    }

    public function search($keyword) {
        return $this->movie->search($keyword);
    }
}
?>
