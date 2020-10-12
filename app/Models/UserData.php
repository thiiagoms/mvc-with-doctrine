<?php

namespace App\Models;
 
use Database\Database;

class UserData extends Database{
    
    
    private object $con;

    public function index() {

        $this->con = $this->open();
        $query = "SELECT * FROM users;";
        $result = $this->con->prepare($query);
        $result->execute();
        
    }

    public function show(int $id) {

    }

    // show form
    public function create() {

    }

    // create user
    public function store() {

    }

}