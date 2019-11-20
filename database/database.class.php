<?php
 /**
  * @author Thiago Martins
  */

  class Database {
    // Database settings
    public $dbHost = array('local' => 'localhost', 'prod' => '');
    public $dbUser = array('local' => 'root', 'prod' => '');
    public $dbPass = array('local' => '', 'prod' => '');
    public $dbName = array('local' => 'crud_test', 'prod' => '');
    // Database obj
    public $conn = null;
    public $query = '';

    // open connection to database on the construct
    public function __construct() {
      $this->connectDatabaseConnection();
    }

    public function connectDatabaseConnection(){
        try {
          $this->conn = new PDO("mysql:host={$this->dbHost['local']};dbname={$this->dbName['local']}", "{$this->dbUser['local']}", "{$this->dbPass['local']}");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          echo "Error: {$e->getMessage()}";
        }
        return $this->conn;
    }

    public function closeDatabaseConnection() {
      $conn = null;
    }

    // Pass the option as param
    public function runQuery($query){
      $this->query = $this->conn->prepare($query);
      $this->query->execute();
      return $this->query;
    }
  }
?>