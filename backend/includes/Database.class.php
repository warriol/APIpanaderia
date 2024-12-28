<?php
    $config = require "../../../.env";
    class Database {
        private $host;
        private $usuario;
        private $pass;
        private $base;

        public function __construct() {
            if (isset($config)) {
                $this->host = $config['DB_HOST'];
                $this->usuario = $config['DB_USER'];
                $this->pass = $config['DB_PASS'];
                $this->base = $config['DB_NAME'];
            }
        }

        public function getConnection() {
            $hostDB = "mysql:host={$this->host};dbname={$this->base}";

            try {
                $connection = new PDO($hostDB, $this->usuario, $this->pass);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connection;
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }