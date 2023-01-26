<?php

namespace Kamil\FilmRental\Service;

use Exception;
use Kamil\FilmRental\Repository\DataRepository;

class DataService
{
    private DataRepository $dataRepository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function getNameAndSurname($request)
    {
        if (isset($request['name'])) {
            $parts = explode(" ", $request['name']);
            if (count($parts) > 1) {
                $lastName = array_pop($parts);
                $firstName = implode(" ", $parts);
            } else {
                $firstName = $request;
                $lastname = "";
            }

            if (!isset($firstName) || empty($firstName)) {
                throw new Exception('First Name is required field ');
            }

            if (!isset($lastName) || empty($lastName)) {
                throw new Exception('Last name is required ');
            }

            return $this->dataRepository->getActorByName($firstName, $lastName,);
        }

        if (isset($request['actorId'])) {

            $actorId = $request['actorId'];

            if (!isset($actorId) || empty($actorId)) {
                throw new Exception('Need actor Id to render actor page  ');
            }

            return $this->dataRepository->getActorById($actorId);
        }

    }
}

