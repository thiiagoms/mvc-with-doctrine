<?php

namespace App\Interface;

interface UserInterface
{
    public function auth(): void;
    public function login(): void;
    public function logout(): void; 
}
