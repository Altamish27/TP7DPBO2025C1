<?php
require_once '../config/config.php';


class Actor {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $birthdate, $nationality, $biography, $image) {
        $sql = "INSERT INTO Actors (Name, Birthdate, Nationality, Biography, Image) 
                VALUES (:name, :birthdate, :nationality, :biography, :image)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':birthdate' => $birthdate,
            ':nationality' => $nationality,
            ':biography' => $biography,
            ':image' => $image
        ]);
    }

    public function getAllActors() {
        $sql = "SELECT * FROM Actors";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getActorById($id) {
        $sql = "SELECT * FROM Actors WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $birthdate, $nationality, $biography, $image) {
        $sql = "UPDATE Actors SET Name = :name, Birthdate = :birthdate, Nationality = :nationality, 
                Biography = :biography, Image = :image WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':birthdate' => $birthdate,
            ':nationality' => $nationality,
            ':biography' => $biography,
            ':image' => $image
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM Actors WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>
