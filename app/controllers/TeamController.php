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
}
