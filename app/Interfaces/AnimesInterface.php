<?php

namespace App\Interfaces;

interface AnimesInterface
{
    public function index(): void;
    public function create(): void;
    public function store(): void;
    public function delete(): void;
    public function update(): void;
}
