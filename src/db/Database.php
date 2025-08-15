<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct() {
        $this->host = getenv('MYSQL_HOST');
        $this->db_name = getenv('MYSQL_DATABASE');
        $this->username = getenv('MYSQL_USER');
        $this->password = getenv('MYSQL_PASSWORD');
    }

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->db_name,
                $this->username,
                $this->password,
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        return $this->conn;
    }
}
