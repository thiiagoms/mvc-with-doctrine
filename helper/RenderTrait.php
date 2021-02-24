<?php

namespace Helper;

trait RenderTrait
{
    public function render(string $template, array $data): string
    { 
        extract($data);
        ob_start();
        require __DIR__ . '/../resources/views/' . $template . '.php';
        $html = ob_get_clean();
        
        return $html;
    }
}
