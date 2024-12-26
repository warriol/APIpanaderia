<?php

require_once("../includes/Client.class.php");

/*
if (isset($_POST)) {
    print_r($_POST["apellido"]);
}
*/

if ($_SERVER["REQUEST_METHOD"] == "POST"
&& isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["telefono"]) && isset($_POST["correo"])) {
    Client::create_cliente($_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["correo"]);

    header("Status: 201");
} else {
    header("Status: 400 Bad Request");
}