<?php

namespace Kamil\FilmRental\Container;


use Kamil\FilmRental\Controller\Controller;
use Kamil\FilmRental\Framework\Router;
use Kamil\FilmRental\Repository\DataRepository;
use Kamil\FilmRental\Service\DataService;
use RuntimeException;


class DIContainer
{
    private array $entries = [];

    public function loadDependencies()
    {

        $this->set(
            Router::class,
            function (DIContainer $container) {
                return new Router(
                    $container->get(Controller::class)
                );
            }
        );

        $this->set(
            Controller::class,
            function (DIContainer $container) {
                return new Controller(
                    $container->get(DataRepository::class),
                    $container->get(DataService::class)
                );
            }
        );

        $this->set(
            DataRepository::class,
            function (DIContainer $container) {
                return new DataRepository();
            }
        );

        $this->set(
            DataService::class,
            function (DIContainer $container) {
                return new DataService(
                    $container->get(DataRepository::class)
                );
            }
        );


    }

    public function set(string $id, callable $callable): void
    {
        $this->entries[$id] = $callable;
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new RuntimeException('Class ' . $id . ' not found in container.');
        }
        $entry = $this->entries[$id];

        return $entry($this);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }
}