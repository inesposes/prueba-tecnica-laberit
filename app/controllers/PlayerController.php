<?php
require_once "models/Player.php";
require_once "models/Team.php";


class PlayerController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $player = new Player($this->db);
        $players = $player->getAll();
   
        include "views/Player/index.php";
    }

    public function create() {
        $team = new Team($this->db);  
        $teams = $team->getAll();

        $errors=[];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $playerName = trim($_POST["player_name"] ?? "");
            $playingNumber = $_POST["playing_number"] ?? null;
            $characteristics   = trim($_POST["characteristics"] ?? "");
            $teamId = $_POST["team_id"] ?? null;
            
            if ($playerName === "") {
                $errors[] = "El nombre del jugador es obligatorio.";
            }
    
            if ($playingNumber === null || !filter_var($playingNumber, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 30]])) {
                $errors[] = "Los puntos deben estar entre 0 y 30";
            }
    
            if ($characteristics === "") {
                $errors[] = "Las características son obligatorias";
            }
    
            if ($teamId === null || !filter_var($teamId, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
                $errors[] = "El ID del equipo debe ser válido.";
            }

            if (!empty($errors)) {
                require "views/Player/create.php";
                return;
            }
            
            $player = new Player($this->db); 
            $player->setPlayerName($playerName );
            $player->setPlayingNumber($playingNumber);
            $player->setCharacteristics ($characteristics);
            $player->setTeamId($_POST["team_id"]);
            $player->create();
            header("Location: index.php");
            return;
        }
        include "views/Player/create.php";
    }

    public function update($id) {
        $team = new Team($this->db);  
        $teams = $team->getAll();
    
        $player = new Player($this->db);
        $playerInfo = $player->getById($id);
        
        if (!$playerInfo) {
            header("Location: index.php");
            return;
        }
    
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $playerName      = trim($_POST["player_name"] ?? "");
            $playingNumber   = $_POST["playing_number"] ?? null;
            $characteristics = trim($_POST["characteristics"] ?? "");
            $teamId          = $_POST["team_id"] ?? null;
    
            if ($playerName === "") {
                $errors[] = "El nombre del jugador es obligatorio.";
            }
    
            if ($playingNumber === null || !filter_var($playingNumber, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 30]])) {
                $errors[] = "El número de jugador debe estar entre 0 y 30.";
            }
    
            if ($characteristics === "") {
                $errors[] = "Las características son obligatorias.";
            }
    
            if ($teamId === null || !filter_var($teamId, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
                $errors[] = "El ID del equipo debe ser válido.";
            }
    
            if (empty($errors)) {
                $player->setId($id);
                $player->setPlayerName($playerName);
                $player->setPlayingNumber($playingNumber);
                $player->setCharacteristics($characteristics);
                $player->setSportId($teamId);
                $player->update();
    
                header("Location: index.php");
                return;
            }
    
            $playerInfo = [
                "id" => $id,
                "player_name" => $playerName,
                "playing_number" => $playingNumber,
                "characteristics" => $characteristics,
                "team_id" => $teamId,
            ];
        }
    
        include "views/Player/update.php";
    }

    
}
