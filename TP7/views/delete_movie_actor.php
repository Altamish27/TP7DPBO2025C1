<?php
require_once '../controllers/MovieActorController.php';
$movieActorController = new MovieActorController($pdo);

if (isset($_GET['movie_id']) && isset($_GET['actor_id'])) {
    $movieActorController->deleteActorFromMovie($_GET['movie_id'], $_GET['actor_id']);
    header('Location: index.php');
}
?>
