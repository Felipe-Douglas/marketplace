<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class Products extends DataLayer
{
    public function __construct()
    {
        parent::__construct("products", ["name", "price"]);
    }
}