<?php
require_once '../controllers/ReviewController.php';
$reviewController = new ReviewController($pdo);

if (isset($_GET['id'])) {
    $review = $reviewController->getReviewById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reviewController->update($_GET['id'], $_POST['rating'], $_POST['review']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
</head>
<body>
    <h1>Edit Review</h1>

    <form method="POST">
        <label for="rating">Rating:</label><br>
        <input type="number" name="rating" value="<?php echo htmlspecialchars($review['Rating']); ?>" required><br><br>

        <label for="review">Review:</label><br>
        <textarea name="review" required><?php echo htmlspecialchars($review['Review']); ?></textarea><br><br>

        <button type="submit">Update Review</button>
    </form>
</body>
</html>
