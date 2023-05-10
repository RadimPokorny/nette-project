<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


class RouterFactory
{
    /**
     * @return Nette\Application\IRouter
     */
    public static function createRouter(): Nette\Application\IRouter
    {
        $router = new RouteList;
        $router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
        return $router;
    }
}

