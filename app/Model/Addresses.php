<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class Addresses extends DataLayer
{
    public function __construct()
    {
        parent::__construct("address", ["user_id", "street", "number", "locality", "city", "region_code", "country", "postal_code"]);
    }
}