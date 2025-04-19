<?php
require_once '../class/Genre.php';

class GenreController {
    private $genre;

    public function __construct($pdo) {
        $this->genre = new Genre($pdo);
    }

    public function create($name) {
        $this->genre->create($name);
    }

    public function getAllGenres() {
        return $this->genre->getAllGenres();
    }

    public function getGenreById($id) {
        return $this->genre->getGenreById($id);
    }

    public function update($id, $name) {
        $this->genre->update($id, $name);
    }

    public function delete($id) {
        $this->genre->delete($id);
    }
}
?>
