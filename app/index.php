<?php
require_once 'db/Database.php';
require_once 'models/Team.php';
require_once 'controllers/TeamController.php';

$db = new Database();

$team_controller = new TeamController($db);
$team_controller->index(); 