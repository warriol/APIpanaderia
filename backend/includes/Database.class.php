<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $database = "panaderia";

    public function getConnection() {
        $hostDB = "mysql:host={$this->host};dbname={$this->database}";

        try {
            $connection = new PDO($hostDB, $this->usuario, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}