<?php
class Cliente{

    private $nombreTabla = "clientes";
    public $idCliente;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    private function htmlspecialchars() {
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
    }

    function read() {
        if ($this->idCliente) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->nombreTabla . " WHERE idCliente = ?");
            $stmt->bind_param("i", $this->idCliente);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->nombreTabla . " ORDER BY nombre ASC");
        }
        $stmt->execute();
        return $stmt->get_result();
    }

    function create() {
        $stmt = $this->conn->prepare("INSERT INTO "
            . $this->nombreTabla
            . " (`nombre`, `apellido`, `telefono`, `correo`) VALUES (?, ?, ?, ?)");

        $this->htmlspecialchars();

        $stmt->bind_param("ssss", $this->nombre, $this->apellido, $this->telefono, $this->correo);

        if ($stmt->execute()) {
            return true;
        }

        return false;

    }

    function update() {
        $stmt = $this->conn->prepare("UPDATE "
        . $this->nombreTabla
        . " SET nombre = ? , apellido = ? , telefono = ? , correo = ?"
        . " WHERE idCliente = ?");

        $this->htmlspecialchars();

        $stmt->bind_param("ssss", $this->nombre, $this->apellido, $this->telefono, $this->correo);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete() {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->nombreTabla . " WHERE idCliente = ?");
        $this->idCliente = htmlspecialchars(strip_tags($this->idCliente));
        $stmt->bind_param("i", $this->idCliente);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}