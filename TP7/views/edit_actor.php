<?php
require_once '../controllers/ActorController.php';
$actorController = new ActorController($pdo);

if (isset($_GET['id'])) {
    $actor = $actorController->getActorById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $actorController->update($_GET['id'], $_POST['name'], $_POST['birthdate'], $_POST['nationality'], $_POST['biography'], $_POST['image']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Actor</title>
</head>
<body>
    <h1>Edit Actor</h1>

    <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($actor['Name']); ?>" required><br><br>

        <label for="birthdate">Birthdate:</label><br>
        <input type="date" name="birthdate" value="<?php echo htmlspecialchars($actor['Birthdate']); ?>" required><br><br>

        <label for="nationality">Nationality:</label><br>
        <input type="text" name="nationality" value="<?php echo htmlspecialchars($actor['Nationality']); ?>" required><br><br>

        <label for="biography">Biography:</label><br>
        <textarea name="biography" required><?php echo htmlspecialchars($actor['Biography']); ?></textarea><br><br>

        <label for="image">Image URL:</label><br>
        <input type="text" name="image" value="<?php echo htmlspecialchars($actor['Image']); ?>"><br><br>

        <button type="submit">Update Actor</button>
    </form>
</body>
</html>
