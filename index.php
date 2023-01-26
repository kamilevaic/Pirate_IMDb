<?php

use Kamil\FilmRental\Container\DIContainer;
use Kamil\FilmRental\Framework\Router;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require './vendor/autoload.php';

// Load custom DI container
$container = new DIContainer();
$container->loadDependencies();

//Modify url adress
$requestUri = str_replace('/film_rental', "", $_SERVER['REQUEST_URI']);


$router = $container->get(Router::class);
$router->process($requestUri, $_POST);

