<?php
class Team {
    private $conn;
    private $table = "team";

    private $id;
    private $team_name;
    private $points;
    private $city_id;
    private $sport_id;
    private $created_at;
    private $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getTeamName() { return $this->team_name; }
    public function getPoints() { return $this->points; }
    public function getCityId() { return $this->city_id; }
    public function getSportId() { return $this->sport_id; }
    public function getCreatedAt() { return $this->created_at; }
    public function getUpdatedAt() { return $this->updated_at; }

    // Setters
    public function setTeamName($name) {
        $this->team_name = htmlspecialchars(strip_tags(trim($name)));
    }

    public function setPoints($points) {
        $this->points = (int)$points;
    }

    public function setCityId($city_id) {
        $this->city_id = (int)$city_id;
    }

    public function setSportId($sport_id) {
        $this->sport_id = (int)$sport_id;
    }

    // CRUD
    public function getAll() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getOne($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO {$this->table} (team_name, points, city_id, sport_id) VALUES (:team_name, :points, :city_id, :sport_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":team_name", $this->team_name);
        $stmt->bindValue(":points", $this->points, PDO::PARAM_INT);
        $stmt->bindValue(":city_id", $this->city_id, PDO::PARAM_INT);
        $stmt->bindValue(":sport_id", $this->sport_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
    
}
