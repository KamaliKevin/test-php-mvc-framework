<?php

class Products
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        $this->view("products");
    }
}
