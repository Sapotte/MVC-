<?php

abstract class Model {

    protected $connection;
    protected $requete;
    protected $table;

    public function __construct() {
        define('SERVER' , "localhost");
        define('USER' , "root");
        define('PASSWORD' , "");
        define('BASE' , "cefiidev1236");
        try {
            $this->connection = new PDO("mysql:host=".SERVER.";dbname=".BASE, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
     catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

    }

}