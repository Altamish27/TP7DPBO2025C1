<?php
require_once '../controllers/ReviewController.php';
$reviewController = new ReviewController($pdo);

if (isset($_GET['id'])) {
    $reviewController->delete($_GET['id']);
    header('Location: index.php');
}
?>
