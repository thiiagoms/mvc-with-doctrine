<?php

namespace Database;

use PDO;
use PDOException;
use Utils\Utils;

class Database extends Utils {

    private string $dbDriver;
    private string $dbHost;
    private string $dbPort;
    private string $dbUser;
    private string $dbPass;
    private string $dbName;
    private object $query;
    private object $dbCon;

    public function __construct()
    {
        $utils = new Utils();
        $utils->loadEnv();

        $this->dbDriver = $_ENV['DATABASE_DRIVER'];
        $this->dbHost = $_ENV['DATABASE_HOST'];
        $this->dbPort = $_ENV['DATABASE_PORT'];
        $this->dbName = $_ENV['DATABASE_NAME'];
        $this->dbUser = $_ENV['DATABASE_USER'];
        $this->dbPass = $_ENV['DATABASE_PASS'];
    }

    public function open() {
        
        try {
            $this->dbCon = new PDO(
                $this->dbDriver  
                . ':host=' . $this->dbHost 
                . ';port=' . $this->dbPort
                . ';dbname=' . $this->dbName,
                $this->dbUser,
                $this->dbPass
            );
            return $this->dbCon;
        } catch (PDOException $e) {
            echo "Erro: {$e->getMessage()}";            
        }
    }

    public function runQuery(string  $query) {
        $this->query = $this->dbCon->prepare($query);
        $this->query->execute();
        return $this->query;
    }

    public function close() {
       return $this->dbCon = null;
    }
}