<?php

namespace Core;

class SettingsView
{


    private string $nameView;
    private array $data;

    public function __construct(string $nameView, array $data = NULL)
    {
        $this->nameView = $nameView;
        if (isset($data)) {
           $this->data = $data;   
        }
    }

    public function render()
    {
        if (file_exists('resources' . DIRECTORY_SEPARATOR . $this->nameView . '.php')) {
            echo "Arquivo existe";
            require 'resources' . DIRECTORY_SEPARATOR . $this->nameView . '.php';
        } else {
            echo "Arquivo nao existe";
            echo "Failed to load view: {$this->nameView}";
        }
    }
}
