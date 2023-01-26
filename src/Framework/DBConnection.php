<?php

namespace Kamil\FilmRental\Framework;

use PDO;

class DBConnection
{
    private static $instnace = null;
    private $conn;

    private $host = 'localhost:3306';
    private $user = 'root';
    private $password = '';
    private $name = 'film_rental';

    private function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->host; dbname=$this->name", $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
    }

    public static function getInstance()
    {
        if (!isset(self::$instnace)) {
            self::$instnace = new DBConnection();
        }

        return self::$instnace;
    }

    public function getConnection()
    {
        return $this->conn;
    }

}