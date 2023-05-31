<?php

class App
{
    // Properties:
    private $controller = "Home";
    private $method = "index";

    // Methods:
    private function splitURL(){
        return explode("/", trim($_GET["url"] ?? "home", "/"));
    }

    public function loadController(){
        $URL = $this->splitURL();

        /* Select controller */
        $fileName = "../app/controllers/".ucfirst($URL[0]).".php";
        $this->controller = ucfirst($URL[0]);
        unset($URL[0]);

        if(!file_exists($fileName)){
            $fileName = "../app/controllers/_404.php";
            $this->controller = "_404";
        }
        require $fileName;

        $controller = new $this->controller;

        /* Select method */
        if(!empty($URL[1])){
            if(method_exists($controller, $URL[1])){
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }
        call_user_func_array([$controller, $this->method], $URL);
    }
}
