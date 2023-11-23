<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$route = new Router(URL_BASE);
$route->namespace("App\Controller");

$route->group(null);
$route->get("/", "Web:home");
$route->get("/admin", "Web:admin");
$route->get("/register", "Web:register");
$route->post("/create", "Web:create");
$route->get("/login", "Web:login");
$route->post("/sigin", "Web:sigin");

$route->group("orders");
$route->post("/payment", "Orders:payment");

$route->group("user");
$route->get("/{id}", "User:panel");
$route->get("/logout", "User:logout");

// TRATAMENTO DE ERRO
$route->group("ops");
$route->get("/{errcode}", function ($data) {
  echo "Erro {$data['errcode']}";
  var_dump($data);
});

$route->dispatch();

if ($route->error()) {
  $route->redirect("/ops/{$route->error()}");
}
