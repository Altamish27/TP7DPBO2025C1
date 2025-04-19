<?php
require_once '../controllers/MovieController.php';
$movieController = new MovieController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movieController->create($_POST['title'], $_POST['release_year'], $_POST['genre_id'], $_POST['rating'], $_POST['language'], $_POST['description']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
</head>
<body>
    <h1>Add New Movie</h1>

    <form method="POST">
        <label for="title">Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label for="release_year">Release Year:</label><br>
        <input type="number" name="release_year" required><br><br>

        <label for="genre_id">Genre ID:</label><br>
        <input type="number" name="genre_id" required><br><br>

        <label for="rating">Rating:</label><br>
        <input type="number" step="0.1" name="rating" required><br><br>

        <label for="language">Language:</label><br>
        <input type="text" name="language" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" required></textarea><br><br>

        <button type="submit">Add Movie</button>
    </form>
</body>
</html>
