<?php
require_once 'db/Database.php';
require_once 'models/Team.php';
require_once 'controllers/TeamController.php';

$db = new Database();

$database = new Database();

$controller = new TeamController($db);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch($action) {
    case 'create':
        $controller->create();
        break;
    default:
        $controller->index();
        break;
}
