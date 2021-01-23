<?php

namespace App\Controllers;

class Home {

    public function index() {
        $home = new \Core\SettingsView("Views/index");
        $home->render();
    }
}