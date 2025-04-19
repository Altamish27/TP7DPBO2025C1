<?php
require_once '../controllers/GenreController.php';
$genreController = new GenreController($pdo);

if (isset($_GET['id'])) {
    $genreController->delete($_GET['id']);
    header('Location: index.php');
}
?>
