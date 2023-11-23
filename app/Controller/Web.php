<?php

namespace App\Controller;

use App\Support\Payment;
use League\Plates\Engine;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../theme");
    }

    public function home()
    {
        echo $this->view->render("checkout", [
            "title" => "Checkout"
        ]);
    }
    public function admin()
    {
        echo $this->view->render("admin", [
            "title" => "ADM"
        ]);
    }
}