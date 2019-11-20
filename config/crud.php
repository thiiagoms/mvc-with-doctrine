<?php
  
  require_once(".".DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."database.class.php");
  
  class Crud extends Database {
  
    public $query = '';
    public $fields = '';
    public $values = '';
    public $id = 0;
    
    public function setFields($fields){
      $this->fields = $fields;
    }
    
    public function setValues($values){
      $this->values = $values;
    }
    
    public function setId($id) {
      $this->id = $id;
    }

    public function create() : int {
      $this->query = "INSERT INTO tbl_user ($this->fields) VALUES ($this->values)";
      $stmt = parent::runQuery($this->query);
      if($stmt):
        return 1;
      else:
        return 0;
      endif;
    }
    
    public function read(){
      $this->query = "SELECT * FROM tbl_user";
      $stmt = parent::runQuery($this->query);
      return $stmt->fetchAll();
    }

    public function readUser() {
      $this->query = "SELECT * FROM tbl_user WHERE id = $this->values ";
      $stmt = parent::runQuery($this->query);
      return $stmt->fetchAll();
    }

    public function update() : int {
      $this->query = "UPDATE tbl_user SET $this->fields WHERE id = $this->values";
      $stmt = parent::runQuery($this->query);
      if($stmt):
        return 1;
      else:
        return 0;
      endif;
    }

    public function deleteUser() : int {
      $this->query = "DELETE FROM tbl_user WHERE id= $this->values";
      $stmt = parent::runQuery($this->query);
      if($stmt):
        return 1;
      else:
        return 0;
      endif;
    }
    
  }
?> 