<?php
require_once "models/Team.php";

class TeamController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $team = new Team($this->db);
        $teams = $team->getAll();
        include "views/Team/index.php";
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $team = new Team($this->db); 
            $team->setTeamName($_POST["team_name"]);
            $team->setPoints($_POST["points"]);
            $team->setCityId ($_POST["city_id"]);
            $team->setSportId($_POST["sport_id"]);
            $team->create();
            header("Location: index.php");
            exit;
        }
        include "views/Team/create.php";
    }

    
}
