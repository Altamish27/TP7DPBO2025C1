<?php
require_once '../controllers/MovieController.php';
$movieController = new MovieController($pdo);

if (isset($_GET['id'])) {
    $movie = $movieController->getMovieById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movieController->update($_GET['id'], $_POST['title'], $_POST['release_year'], $_POST['genre_id'], $_POST['rating'], $_POST['language'], $_POST['description']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
</head>
<body>
    <h1>Edit Movie</h1>

    <form method="POST">
        <label for="title">Title:</label><br>
        <input type="text" name="title" value="<?php echo htmlspecialchars($movie['Title']); ?>" required><br><br>

        <label for="release_year">Release Year:</label><br>
        <input type="number" name="release_year" value="<?php echo htmlspecialchars($movie['Release_Year']); ?>" required><br><br>

        <label for="genre_id">Genre ID:</label><br>
        <input type="number" name="genre_id" value="<?php echo htmlspecialchars($movie['Genre_ID']); ?>" required><br><br>

        <label for="rating">Rating:</label><br>
        <input type="number" step="0.1" name="rating" value="<?php echo htmlspecialchars($movie['Rating']); ?>" required><br><br>

        <label for="language">Language:</label><br>
        <input type="text" name="language" value="<?php echo htmlspecialchars($movie['Language']); ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" required><?php echo htmlspecialchars($movie['Description']); ?></textarea><br><br>

        <button type="submit">Update Movie</button>
    </form>
</body>
</html>
