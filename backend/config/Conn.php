<?php
class Conn {
    private $host = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $base = "panaderia";

    public function conectar(){
        $conn = new mysqli($this->host, $this->usuario, $this->pass, $this->base);
        if($conn->connect_error){
            die("Fallo la conexion");
        } else {
            return $conn;
        }
    }
}