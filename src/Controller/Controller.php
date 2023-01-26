<?php

namespace Kamil\FilmRental\Controller;

use Kamil\FilmRental\Repository\DataRepository;
use Kamil\FilmRental\Service\DataService;
use Smarty;

class Controller
{
    private DataRepository $dataRepository;
    private DataService $dataService;

    public function __construct(DataRepository $dataRepository, DataService $dataService)
    {
        $this->dataRepository = $dataRepository;
        $this->dataService = $dataService;
    }

    public function loadHomePage()
    {
        $smarty = new Smarty();
        $smarty->display(__DIR__ . './../Views/HomePage.tpl');
    }

    public function loadActorsPage()
    {

        $actor = $this->dataRepository->getAllActors();

        $smarty = new Smarty();
        $smarty->assign(['actor' => $actor]);
        $smarty->display(__DIR__ . './../Views/AllActors.tpl');
    }

    public function getActor(array $request)
    {
        $actorFilms = $this->dataService->getNameAndSurname($request);

        $smarty = new Smarty();
        $smarty->assign(['actorFilms' => $actorFilms]);
        $smarty->display(__DIR__ . './../Views/ActorPage.tpl');
    }

    public function getAllFilms()
    {

        $films = $this->dataRepository->getAllFilms();

        $smarty = new Smarty();
        $smarty->assign(['films' => $films]);
        $smarty->display(__DIR__ . './../Views/Films.tpl');
    }
//    KODAS APAČIOJ NENAUDOJAMAS, NEIŠPILDYTA IDĖJA
//    public function searchByName(array $request)
//    {
//        $actors = $this->dataRepository->getActorsByName($request);
//
//        $smarty = new \Smarty();
//        $smarty->assign(['actor'=>$actors]);
//        $smarty->display(__DIR__ . './../Views/AllActors.tpl');
//    }


}