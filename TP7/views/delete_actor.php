<?php
require_once '../controllers/ActorController.php';
$actorController = new ActorController($pdo);

if (isset($_GET['id'])) {
    $actorController->delete($_GET['id']);
    header('Location: index.php');
}
?>
