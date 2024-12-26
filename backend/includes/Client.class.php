<?php

require_once("Database.class.php");
class Client{

    public static function create_cliente($nombre, $apellido, $telefono, $correo){
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('INSERT INTO clientes (nombre, apellido, telefono, correo) VALUES (:nombre, :apellido, :telefono, :correo)');
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        if ($stmt->execute()) {
            header('HTTP/1.1 201 Cliente creado correctamente');
        } else {
            header('HTTP/1.1 401 Cliente no creado');
        }

    }
}