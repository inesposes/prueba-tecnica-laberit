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
            $isCaptain = $_POST["is_captain"] ?? null;

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
            $player->setTeamId($teamId);
            $player->create();

            if ($isCaptain) {
                $team->updateCaptain($teamId, $this->db->lastInsertId());
            }
            
            header("Location: index.php?controller=team&action=show&id=" . $teamId);
            return;
        }
        include "views/Player/create.php";
    }

    public function update() {

        if (!isset($_GET['id'])) {
            die("No se proporcionó un ID válido.");
        } 
    
        $id = $_GET['id']; 

        $team = new Team($this->db);  
        $teams = $team->getAll();
    
        $player = new Player($this->db);
        $playerInfo = $player->getOne($id);
        
        if (!$player) {
            header("Location: index.php");
            return;
        }
    
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $playerName      = trim($_POST["player_name"] ?? "");
            $playingNumber   = $_POST["playing_number"] ?? null;
            $characteristics = trim($_POST["characteristics"] ?? "");
            $teamId          = $_POST["team_id"] ?? null;
            $isCaptain = $_POST["is_captain"] ?? null;

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
                $player->setPlayerName($playerName);
                $player->setPlayingNumber($playingNumber);
                $player->setCharacteristics($characteristics);
                $player->setTeamId($teamId);
                $player->update($id);

                if ($isCaptain) {
                    $team->updateCaptain($teamId, $playerInfo['id']);
                }
    
    
                header("Location: index.php?controller=team&action=show&id=" . $teamId);
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

    public function delete() {
        if (!isset($_GET['id'])) {
            die("No se proporcionó un ID válido.");
        } 
    
        $id = $_GET['id']; 
        
        $player = new Player($this->db);
        $playerData=$player->getOne($id);
        $teamId=$playerData['team_id'];
        $player->delete($id);

        header("Location: index.php?controller=team&action=show&id=" . $teamId);

    }

    
}
