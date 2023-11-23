<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class Users extends DataLayer
{
    public function __construct()
    {
        parent::__construct("users", ["first_name", "last_name", "user_email", "user_pass"]);
    }
}