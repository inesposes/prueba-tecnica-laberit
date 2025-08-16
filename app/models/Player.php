<?php
class Player {
    private $conn;
    private $table = "player";

    private $id;
    private $player_name;
    private $playing_number;
    private $characteristics;
    private $team_id;
    private $created_at;
    private $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getPlayerName() { return $this->player_name; }
    public function getPlayingNumber() { return $this->playing_number; }
    public function getCharacteristics() { return $this->characteristics; }
    public function getTeamId() { return $this->team_id; }
    public function getCreatedAt() { return $this->created_at; }
    public function getUpdatedAt() { return $this->updated_at; }

    // Setters
    public function setPlayerName($name) {
        $this->player_name = $name;
    }

    public function setPlayingNumber($number) {
        $this->playing_number = (int)$number;
    }

    public function setCharacteristics($characteristics) {
        $this->characteristics = $characteristics;
    }

    public function setTeamId($team_id) {
        $this->team_id = (int)$team_id;
    }

    // CRUD
    public function getAll() {
        $query = "SELECT p.*, t.team_name AS team_name FROM {$this->table} p JOIN team t ON p.team_id = t.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getOne($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function create() {
        $query = "INSERT INTO {$this->table} (player_name, playing_number, characteristics, team_id) VALUES (:player_name, :playing_number, :characteristics, :team_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":player_name", $this->player_name);
        $stmt->bindValue(":playing_number", $this->playing_number, PDO::PARAM_INT);
        $stmt->bindValue(":characteristics", $this->characteristics);
        $stmt->bindValue(":team_id", $this->team_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function update($id) {
        $query = "UPDATE {$this->table} SET player_name = :player_name, playing_number = :playing_number, characteristics = :characteristics, team_id = :team_id WHERE id = :id";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":player_name", $this->player_name);
        $stmt->bindValue(":playing_number", $this->playing_number, PDO::PARAM_INT);
        $stmt->bindValue(":characteristics", $this->characteristics);
        $stmt->bindValue(":team_id", $this->team_id, PDO::PARAM_INT);
        $stmt->bindValue(":id", $id);

    
        return $stmt->execute();
    }
    
    
}
