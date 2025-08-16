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
        $errors=[];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $teamName = trim($_POST["team_name"] ?? "");
            $points   = $_POST["points"] ?? null;
            $cityId   = $_POST["city_id"] ?? null;
            $sportId  = $_POST["sport_id"] ?? null;
            
            if ($teamName === "") {
                $errors[] = "El nombre del equipo es obligatorio.";
            } elseif (strlen($teamName) > 50) {
                $errors[] = "El nombre del equipo no puede superar los 50 caracteres.";
            }
    
            if ($points === null || !filter_var($points, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 100]])) {
                $errors[] = "Los puntos deben estar entre 0 y 100";
            }
    
            if ($cityId === null || !filter_var($cityId, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
                $errors[] = "El ID de la ciudad debe ser válido.";
            }
    
            if ($sportId === null || !filter_var($sportId, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
                $errors[] = "El ID del deporte debe ser válido.";
            }
    
            if (!empty($errors)) {
                require "views/Team/create.php";
                return;
            }
            
            $team = new Team($this->db); 
            $team->setTeamName($_POST["team_name"]);
            $team->setPoints($_POST["points"]);
            $team->setCityId ($_POST["city_id"]);
            $team->setSportId($_POST["sport_id"]);
            $team->create();
            header("Location: index.php");
            return;
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
        $players = $team->getPlayers($id);
    
        include "views/Team/show.php";    
    }

    
}
