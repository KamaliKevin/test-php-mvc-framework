<?php

namespace models;

class User
{
    // Parents:
    use \Model;

    // Properties:
    protected $table = "users";
    protected $allowedColumns = [
        "username",
        "first_name",
        "last_name",
        "date_of_birth",
        "email",
        "phone_number"
    ];
}