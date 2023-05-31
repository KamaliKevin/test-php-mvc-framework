<?php

Trait Controller
{
    public function view($name)
    {
        $fileName = "../app/views/".$name.".view.php";
        if(!file_exists($fileName)){
            $fileName = "../app/views/404.view.php";
        }
        require $fileName;
    }
}