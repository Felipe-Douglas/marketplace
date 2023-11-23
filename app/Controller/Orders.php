<?php

namespace App\Controller;

use App\Support\Payment;

class Orders
{
    public function payment($data)
    {
        $payment = filter_var_array($data, FILTER_SANITIZE_STRING);
        $pay = new Payment();
        $pay->card($payment);
        echo "<pre>";
        print_r($pay->callback());
        echo "</pre>";
        exit;
    }
}