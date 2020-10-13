<?php

namespace Utils;

use \Dotenv\Dotenv;

class Utils
{

    private string $webpath = __DIR__;

    public function loadEnv()
    {
        $dotenv = Dotenv::createImmutable($this->webpath);
        $dotenv->load();
    }

    public function log(string $exception)
    {
        return null;
    }
}
