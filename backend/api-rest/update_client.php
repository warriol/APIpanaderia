<?php
class Conn {
    private $host = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $base = "panaderia";

    public function conectarBD(){
        $hostDB = "mysql:host={$this->host};dbname={$this->base}";

        try {
            $con = new PDO($hostDB, $this->usuario, $this->pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}