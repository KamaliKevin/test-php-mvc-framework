<?php

use models\User;

class Home
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        $this->view("home");
    }
}