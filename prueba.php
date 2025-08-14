<?php
$host = 'db';
$usuario = getenv('MYSQL_USER');
$clave = getenv('MYSQL_PASSWORD');
$baseDatos = getenv('MYSQL_DATABASE');

$conn = new mysqli($host, $usuario, $clave, $baseDatos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conectado correctamente a MySQL!";
?>
