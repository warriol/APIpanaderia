<?php

require_once("../includes/Client.class.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Content-Type: application/json");
    http_response_code(405);
    echo json_encode(["message" => "Method Not Allowed"]);
} else
    if ($_SERVER["REQUEST_METHOD"] == "POST"
        && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["telefono"]) && isset($_POST["correo"])) {

        Client::create_cliente($_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["correo"]);

        header("Content-Type: application/json");
        http_response_code(201);
        echo json_encode(["message" => "Cliente ". $_POST["nombre"] . " " . $_POST["apellido"] . " creado"]);

    } else {
        header("Content-Type: application/json");
        http_response_code(400);
        echo json_encode(["message" => "Bad Request"]);
    }