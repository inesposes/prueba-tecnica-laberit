<?php
require_once 'db/Database.php';

$db = new Database();

try {
    $conn = $db->connect();
} catch (PDOException $e) { 
    echo "Error on connection: " . $e->getMessage();    
}

try {
    $stmt = $conn->query("SELECT * FROM city");
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($cities as $city) {
        echo $city['city_name'] . "<br>";
    }

} catch(PDOException $e) {
    echo "Error on query: " . $e->getMessage();
}



