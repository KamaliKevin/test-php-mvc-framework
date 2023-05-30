<?php

class App
{
    // Properties:
    private $controller = "Home";
    private $method = "index";

    // Methods:
    private function splitURL(){
        return explode("/", $_GET["url"] ?? "home");
    }

    public function loadController(){
        $URL = $this->splitURL();

        $fileName = "../app/controllers/".ucfirst($URL[0]).".php";
        $this->controller = ucfirst($URL[0]);

        if(!file_exists($fileName)){
            $fileName = "../app/controllers/_404.php";
            $this->controller = "_404";
        }
        require $fileName;

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);
    }
}
