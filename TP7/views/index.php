<?php
require_once '../controllers/MovieController.php';
require_once '../controllers/ActorController.php';
require_once '../controllers/GenreController.php';
require_once '../controllers/MovieActorController.php';
require_once '../controllers/ReviewController.php';

$movieController = new MovieController($pdo);
$actorController = new ActorController($pdo);
$genreController = new GenreController($pdo);
$movieActorController = new MovieActorController($pdo);
$reviewController = new ReviewController($pdo);

// Fetch all movies, actors, genres, and reviews
$movies = $movieController->getAllMovies();
$actors = $actorController->getAllActors();
$genres = $genreController->getAllGenres();

// Search functionality for movies
$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $searchResults = $movieController->search($_POST['search']);
}

// Fetch movie-actor relationships
$movieActorRelationships = [];
foreach ($movies as $movie) {
    $movieActorRelationships[$movie['ID']] = $movieActorController->getActorsByMovie($movie['ID']);
}

// Fetch reviews for each movie
$movieReviews = [];
foreach ($movies as $movie) {
    $movieReviews[$movie['ID']] = $reviewController->getReviewsByMovie($movie['ID']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies, Actors, and Reviews Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
            display: flex;
            justify-content: space-between;
        }
        h1, h2 {
            color: #333;
        }
        .left-section {
            width: 60%;
        }
        .right-section {
            width: 35%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #0066cc;
        }
        a:hover {
            text-decoration: underline;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <!-- Right section: Search form -->
    <div class="right-section">
        <h1>Movies, Actors, and Reviews Management</h1>
        <!-- Movie Search Form -->
        <form method="POST">
            <input type="text" name="search" placeholder="Search by Movie Title" required>
            <button type="submit" class="button">Search</button>
        </form>

        <!-- Search Results -->
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']) && !empty($searchResults)): ?>
            <h2>Search Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Release Year</th>
                        <th>Genre</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($searchResults as $movie): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($movie['Title']); ?></td>
                            <td><?php echo $movie['Release_Year']; ?></td>
                            <td><?php echo htmlspecialchars($movie['Genre']); ?></td>
                            <td><?php echo $movie['Rating']; ?></td>
                            <td>
                                <a href="edit_movie.php?id=<?php echo $movie['ID']; ?>">Edit</a> |
                                <a href="delete_movie.php?id=<?php echo $movie['ID']; ?>">Delete</a> |
                                <a href="add_movie_actor.php?movie_id=<?php echo $movie['ID']; ?>">Add Actor</a> |
                                <a href="add_review.php?movie_id=<?php echo $movie['ID']; ?>">Add Review</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Left section: Movies List and other data -->
    <div class="left-section">
        <!-- Movies List -->
        <h2>Movies</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Release Year</th>
                    <th>Genre</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($movie['Title']); ?></td>
                        <td><?php echo $movie['Release_Year']; ?></td>
                        <td><?php echo htmlspecialchars($movie['Genre']); ?></td>
                        <td><?php echo $movie['Rating']; ?></td>
                        <td>
                            <a href="edit_movie.php?id=<?php echo $movie['ID']; ?>">Edit</a> |
                            <a href="delete_movie.php?id=<?php echo $movie['ID']; ?>">Delete</a> |
                            <a href="add_movie_actor.php?movie_id=<?php echo $movie['ID']; ?>">Add Actor</a> |
                            <a href="add_review.php?movie_id=<?php echo $movie['ID']; ?>">Add Review</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="add_movie.php" class="button">Add New Movie</a>

        <!-- Actors List -->
        <h2>Actors</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Birthdate</th>
                    <th>Nationality</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actors as $actor): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($actor['Name']); ?></td>
                        <td><?php echo $actor['Birthdate']; ?></td>
                        <td><?php echo htmlspecialchars($actor['Nationality']); ?></td>
                        <td>
                            <a href="edit_actor.php?id=<?php echo $actor['ID']; ?>">Edit</a> |
                            <a href="delete_actor.php?id=<?php echo $actor['ID']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="add_actor.php" class="button">Add New Actor</a>

        <!-- Genres List -->
        <h2>Genres</h2>
        <table>
            <thead>
                <tr>
                    <th>Genre Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($genres as $genre): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($genre['Name']); ?></td>
                        <td>
                            <a href="edit_genre.php?id=<?php echo $genre['ID']; ?>">Edit</a> |
                            <a href="delete_genre.php?id=<?php echo $genre['ID']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="add_genre.php" class="button">Add New Genre</a>
    </div>

</body>
</html>
                    