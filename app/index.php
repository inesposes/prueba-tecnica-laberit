<?php
require_once 'db/Database.php';
require_once 'models/Team.php';
require_once 'controllers/TeamController.php';
require_once 'controllers/PlayerController.php';

$db = new Database();

$database = new Database();

$controller = new TeamController($db);


$controller = $_GET['controller'] ?? 'team';
$controllerName = ucfirst($controller) . 'Controller';
$controllerClass = new $controllerName($db);
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;


$controllerClass->$action();


