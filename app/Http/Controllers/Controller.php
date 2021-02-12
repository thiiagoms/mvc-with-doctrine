<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function render(string $template, array $data): string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../../../resources/views/animes/' . $template . '.php';
        $html = ob_get_clean();
        
        return $html;
    }
}