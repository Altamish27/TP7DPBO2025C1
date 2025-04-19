<?php
require_once '../controllers/ActorController.php';
$actorController = new ActorController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $actorController->create($_POST['name'], $_POST['birthdate'], $_POST['nationality'], $_POST['biography'], $_POST['image']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Actor</title>
</head>
<body>
    <h1>Add New Actor</h1>

    <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="birthdate">Birthdate:</label><br>
        <input type="date" name="birthdate" required><br><br>

        <label for="nationality">Nationality:</label><br>
        <input type="text" name="nationality" required><br><br>

        <label for="biography">Biography:</label><br>
        <textarea name="biography" required></textarea><br><br>

        <label for="image">Image URL:</label><br>
        <input type="text" name="image"><br><br>

        <button type="submit">Add Actor</button>
    </form>
</body>
</html>
