<?php
class Conn {
    private $host = "http://www.warriol.site:3306";
    private $usuario = "warriols_test";
    private $pass = "E8cv@ma9r634S%,";

    private $port = "3306";
    private $base = "warriols_panaderia_test";

    public function conectar(){
        $conn = new mysqli($this->host, $this->usuario, $this->pass, $this->base);
        if($conn->connect_error){
            die("Fallo la conexion");
        } else {
            return $conn;
        }
    }
}