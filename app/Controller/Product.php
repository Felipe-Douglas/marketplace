<?php

namespace App\Controller;

use App\Model\Products;

class Product
{
    public function newProduct(array $data)
    {
        $product = new Products();
    }
}