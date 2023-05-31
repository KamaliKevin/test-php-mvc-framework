<?php

use models\User;

class Home
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        $user = new User();
        $result = $user->findAll();
        show($result);

        $this->view("home");
    }
}