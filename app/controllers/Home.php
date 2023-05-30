<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model();
        $model->update(3, ["email" => "s_montgomery@gmail.com", "date_of_birth" => "1998-09-24"]);

        $this->view("home");
    }
}