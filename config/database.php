<?php

class Database
{
    private $hostname = "localhost";
    private $database = "tiendaunisimondb";
    private $username = "root";
    private $password = "admin";
    private $charset = "utf8";

    function conectar()
    {
        try {


            $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . "; charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Error conection: ' . $e->getMessage();
            exit;

        }
    }

}