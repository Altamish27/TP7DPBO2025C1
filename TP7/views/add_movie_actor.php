<?php
require_once '../controllers/MovieActorController.php';
$movieActorController = new MovieActorController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movieActorController->addActorToMovie($_POST['movie_id'], $_POST['actor_id'], $_POST['role']);
    header('Location: index.php');
}

// Mendapatkan daftar movies dan actors
require_once '../controllers/MovieController.php';
require_once '../controllers/ActorController.php';
$movieController = new MovieController($pdo);
$actorController = new ActorController($pdo);
$movies = $movieController->getAllMovies();
$actors = $actorController->getAllActors();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Actor to Movie</title>
</head>
<body>
    <h1>Add Actor to Movie</h1>

    <form method="POST">
        <label for="movie_id">Movie:</label><br>
        <select name="movie_id">
            <?php foreach ($movies as $movie): ?>
                <option value="<?php echo $movie['ID']; ?>"><?php echo htmlspecialchars($movie['Title']); ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="actor_id">Actor:</label><br>
        <select name="actor_id">
            <?php foreach ($actors as $actor): ?>
                <option value="<?php echo $actor['ID']; ?>"><?php echo htmlspecialchars($actor['Name']); ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="role">Role:</label><br>
        <input type="text" name="role" required><br><br>

        <button type="submit">Add Actor to Movie</button>
    </form>
</body>
</html>
