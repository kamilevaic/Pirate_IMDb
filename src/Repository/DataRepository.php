<?php

namespace Kamil\FilmRental\Repository;

use Kamil\FilmRental\Framework\DBConnection;
use PDO;

class DataRepository
{
    public function getAllActors()
    {
        $conn = $this->db();
        $statement = $conn->prepare('SELECT * FROM actor ');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    private function db()
    {
        $instance = DBConnection::getInstance();
        return $instance->getConnection();
    }

    public function getActorByName(string $firstName, string $lastName)
    {
        $conn = $this->db();
        $statement = $conn->prepare(
            'SELECT a.id, a.first_name, a.last_name, f.title, f.release_year, f.description
                        FROM actor a 
                        LEFT JOIN film_actor fa ON a.id = fa.actor_id
                        LEFT JOIN film f ON fa.film_id = f.id
                        WHERE (first_name =:firstName AND last_name= :lastName)');

        $statement->execute(['firstName' => $firstName, 'lastName' => $lastName]);
        //
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllFilms()
    {
        $conn = $this->db();
        $statement = $conn->prepare('SELECT * FROM film');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getActorById(string $actorId)
    {
        $conn = $this->db();
        $statement = $conn->prepare(
            'SELECT a.id, a.first_name, a.last_name, f.title, f.release_year, f.description
                        FROM actor a 
                        LEFT JOIN film_actor fa ON a.id = fa.actor_id
                        LEFT JOIN film f ON fa.film_id = f.id
                        WHERE a.id =:actorId');

        $statement->execute(['actorId' => $actorId]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

//          TURĖJAU DAUGIAU IDĖJŲ SEARCH FUNKCIONALUMUI, BET NEPADARIAU
//        public function getActorsByName(array $request)
//        {
//            $parts = explode(" ", trim($request['name']));
//            $query = "SELECT * FROM actor WHERE first_name = :firstName";
//            $searchValues = ['firstName' => $parts[0]];
//
//            if (isset($parts[1]) && !empty($parts[1])) {
//                $query .= " AND last_name = :lastName";
//                $searchValues['lastName'] = $parts[1];
//            }
//
//            $conn = $this->db();
//            $statement = $conn->prepare($query);
//            $statement->execute($searchValues);
//
//            return $statement->fetchAll(\PDO::FETCH_ASSOC);
//        }
}