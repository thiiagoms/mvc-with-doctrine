<?php

namespace App\Http\Controllers;

interface Controller
{
    public function index(): void;
    public function create(): void;
    public function store(): void;
}
