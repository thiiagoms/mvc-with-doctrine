<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interface\UserInterface;

class UserController extends Controller implements UserInterface
{
    
    public function create(): void
    {
        $this->render('users/form', [
            'title' => 'Auth user',
            'button' => 'Login'
        ]);
    }

    public function store(): void
    {
    }
}
