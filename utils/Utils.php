<?php

namespace Utils;

use \Dotenv\Dotenv;
use Exception;

class Utils {

    private string $webpath = __DIR__;

    public function loadEnv()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable($this->webpath);
        $dotenv->load();
    }

    public function log(string $exception) {
        return NULL;
    }
}