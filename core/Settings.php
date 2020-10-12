<?php

namespace Core;

class Settings
{


    private string $url;
    private array  $urlSett;
    private string $urlController;
    private string $urlMethod;


    public function __construct()
    {

        if (!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            $this->urlSett = explode("/", $this->url);

            if ((isset($this->urlSett[0])) &&
                (isset($this->urlSett[1]))
            ) {
                $this->urlController = $this->urlSett[0];
                $this->urlMethod = $this->urlSett[1];
            } else {
                $this->urlController = "erro";
                $this->urlMethod = "notFound";
            }
        } else {
            $this->urlController = "home";
            $this->urlMethod = "index";
        }
    }

    public function loadControllerMethod()
    {
        $urlController = ucwords($this->urlController);
        $urlMethod = $this->urlMethod;
        $classLoads = "\\App\\Controllers\\" . $urlController;
        
        $class = new $classLoads;

        $class->$urlMethod();
    }
}
