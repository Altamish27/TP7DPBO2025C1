<?php
require_once '../controllers/GenreController.php';
$genreController = new GenreController($pdo);

if (isset($_GET['id'])) {
    $genre = $genreController->getGenreById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $genreController->update($_GET['id'], $_POST['name']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genre</title>
</head>
<body>
    <h1>Edit Genre</h1>

    <form method="POST">
        <label for="name">Genre Name:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($genre['Name']); ?>" required><br><br>

        <button type="submit">Update Genre</button>
    </form>
</body>
</html>
