<?php
require_once '../controllers/MovieController.php';
$movieController = new MovieController($pdo);

if (isset($_GET['id'])) {
    $movieController->delete($_GET['id']);
    header('Location: index.php');
}
?>
