<?php

namespace App\Controllers;

class User {

    private array $data;

    /**
     * Display a list of all users 
     * 
     */
    public function index() {
        $index = new \App\Models\UserData();
        $this->data['response'] = $index->index();
        $render = new \Core\SettingsView("Views/user/index", $this->data);
        $render->render();
    }

    /**
     * Display one user
     */
    public function show(int $id) {

    }

    /**
     * Diaplay form to create user
     */
    public function create() {

    }

    /**
     *  Create user
     */
    public function store() {

    }


}