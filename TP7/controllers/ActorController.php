<?php
require_once '../class/Actor.php';

class ActorController {
    private $actor;

    public function __construct($pdo) {
        $this->actor = new Actor($pdo);
    }

    public function create($name, $birthdate, $nationality, $biography, $image) {
        $this->actor->create($name, $birthdate, $nationality, $biography, $image);
    }

    public function getAllActors() {
        return $this->actor->getAllActors();
    }

    public function getActorById($id) {
        return $this->actor->getActorById($id);
    }

    public function update($id, $name, $birthdate, $nationality, $biography, $image) {
        $this->actor->update($id, $name, $birthdate, $nationality, $biography, $image);
    }

    public function delete($id) {
        $this->actor->delete($id);
    }
}
?>
