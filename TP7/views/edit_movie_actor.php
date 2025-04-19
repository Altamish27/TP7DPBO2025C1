<?php
require_once '../controllers/MovieActorController.php';
$movieActorController = new MovieActorController($pdo);

// Menampilkan data yang ingin di-edit
if (isset($_GET['movie_id']) && isset($_GET['actor_id'])) {
    $actorsInMovie = $movieActorController->getActorsByMovie($_GET['movie_id']);
    $actorData = null;

    // Mencari aktor berdasarkan actor_id
    foreach ($actorsInMovie as $actor) {
        if ($actor['Actor_ID'] == $_GET['actor_id']) {
            $actorData = $actor;
            break;
        }
    }
}

// Proses form edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movieActorController->updateActorRole($_GET['movie_id'], $_GET['actor_id'], $_POST['role']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Actor Role</title>
</head>
<body>
    <h1>Edit Actor Role in Movie</h1>

    <?php if ($actorData): ?>
        <form method="POST">
            <label for="role">Role:</label><br>
            <input type="text" name="role" value="<?php echo htmlspecialchars($actorData['Role']); ?>" required><br><br>

            <button type="submit">Update Role</button>
        </form>
    <?php else: ?>
        <p>Actor not found in this movie.</p>
    <?php endif; ?>
</body>
</html>
