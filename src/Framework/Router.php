<?php

namespace Kamil\FilmRental\Framework;

use Kamil\FilmRental\Controller\Controller;

class Router
{
    private Controller $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function process(string $route, array $request = null)
    {
        switch ($route) {
            case '/':
                $this->controller->loadHomePage();
                break;
            case '/actors':
                $this->controller->loadActorsPage();
                break;
            case '/actor':
                $this->controller->getActor($request);
                break;
            case '/films':
                $this->controller->getAllFilms();
                break;
//                KODAS APAČIOJ NENAUDOJAMAS, NEIŠPILDYTA IDĖJA
//            case '/search':
//                $this->controller->searchByName($request);
//                break;
            default:
                echo 'Puslapis nerastas';
                break;
        }
    }
}