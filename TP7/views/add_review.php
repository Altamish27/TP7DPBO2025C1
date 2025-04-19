<?php
require_once '../controllers/ReviewController.php';
$reviewController = new ReviewController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reviewController->create($_POST['movie_id'], $_POST['user_id'], $_POST['rating'], $_POST['review']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
</head>
<body>
    <h1>Add Review</h1>

    <form method="POST">
        <label for="movie_id">Movie ID:</label><br>
        <input type="number" name="movie_id" required><br><br>

        <label for="user_id">User ID:</label><br>
        <input type="number" name="user_id" required><br><br>

        <label for="rating">Rating:</label><br>
        <input type="number" name="rating" required><br><br>

        <label for="review">Review:</label><br>
        <textarea name="review" required></textarea><br><br>

        <button type="submit">Add Review</button>
    </form>
</body>
</html>
