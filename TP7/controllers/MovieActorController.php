<?php
require_once '../class/MovieActor.php';

class MovieActorController {
    private $movieActor;

    public function __construct($pdo) {
        $this->movieActor = new MovieActor($pdo);
    }

    // Fungsi untuk menambahkan actor ke movie
    public function addActorToMovie($movieId, $actorId, $role) {
        $this->movieActor->addActorToMovie($movieId, $actorId, $role);
    }

    // Fungsi untuk mendapatkan actors dari movie
    public function getActorsByMovie($movieId) {
        return $this->movieActor->getActorsByMovie($movieId);
    }

    // Fungsi untuk mendapatkan movies berdasarkan actor
    public function getMoviesByActor($actorId) {
        return $this->movieActor->getMoviesByActor($actorId);
    }

    // Fungsi untuk menghapus actor dari movie
    public function deleteActorFromMovie($movieId, $actorId) {
        $this->movieActor->deleteActorFromMovie($movieId, $actorId);
    }

    // Fungsi untuk memperbarui role actor dalam movie
    public function updateActorRole($movieId, $actorId, $role) {
        $this->movieActor->updateActorRole($movieId, $actorId, $role);
    }
}
?>
