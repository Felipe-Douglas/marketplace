<?php

//SESSION
session_start();

//CHAVE DA API
define("API_KEY", "36E9F3DC4C4D499BA416442BE3F74524");

//TIMEZONE
date_default_timezone_set("America/Sao_Paulo");

// URL BASE DO SITEMA
define("URL_BASE", "http://localhost/umbrella_marketplace");

// CONEXÃO COM O BANCO DE DADOS
define(
  "DATA_LAYER_CONFIG",
  [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "umbrella_marketplace",
    "username" => "root",
    "passwd" => "",
    "options" => [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
  ]
);


// HELPERS

/**
 * RETORNA A URL COMPLETA
 *
 * @param string|null $uri
 * @return string
 */
function url(string $uri = null)
{
  if ($uri) {
    return URL_BASE . "/{$uri}";
  }

  return URL_BASE;
}

/**
 * RETORNA UMA MENSAGEM PARA O USUARIO
 *
 * @param string $message
 * @param string $type
 * @return string
 */
function message(string $message, string $type)
{
  $icon = ["success" => "<i class=\"fa-solid fa-check\"></i>", "danger" => "<i class=\"fa-solid fa-xmark\"></i>"];
  return "<div class=\"alert alert-" . $type . " d-flex align-items-center\" role=\"alert\">
      " . $icon[$type] . " &nbsp;
      " . $message . "
    </div>";
}
