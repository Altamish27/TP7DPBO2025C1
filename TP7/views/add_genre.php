<?php
require_once '../controllers/GenreController.php';
$genreController = new GenreController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $genreController->create($_POST['name']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Genre</title>
</head>
<body>
    <h1>Add Genre</h1>

    <form method="POST">
        <label for="name">Genre Name:</label><br>
        <input type="text" name="name" required><br><br>

        <button type="submit">Add Genre</button>
    </form>
</body>
</html>
