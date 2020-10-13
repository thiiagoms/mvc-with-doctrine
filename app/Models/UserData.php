<?php

namespace App\Models;
 
use Database\Database;

class UserData extends Database{
    

    private object $query;
   
    public function index() {

        $query = "SELECT * FROM user";
        $this->query = $this->query($query);
        $return = $this->query->fetchAll();
        return $return;
    }


}