<?php

namespace App\Interfaces;

interface UserInterface
{
    public function auth(): void;
    public function login(): void;
    public function logout(): void;
}
