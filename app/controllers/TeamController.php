<?php
require_once "models/Team.php";
require_once "models/City.php";
require_once "models/Sport.php";


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
        $city = new City($this->db);  
        $cities = $city->getAll();

        $sport = new Sport($this->db);  
        $sports = $sport->getAll();

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

    public function show() {
        if (!isset($_GET['id'])) {
            die("No se proporcionó un ID válido.");
        } 
    
        $id = $_GET['id']; 
    
        $team = new Team($this->db);      
        $equipo = $team->getOne($id);       
    
        include "views/Team/show.php";    
    }

    
}
