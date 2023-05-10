<?php

declare(strict_types=1);

namespace App;

use Nette\Bootstrap\Configurator;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;

require __DIR__ . '/router/RouterFactory.php';
require __DIR__ . '/../vendor/autoload.php';

class Bootstrap
{
    public static function boot(): void
    {
        $configurator = new Configurator;
        $appDir = dirname(__DIR__);

        //$configurator->setDebugMode('secret@23.75.345.200'); // enable for your remote IP
        $configurator->enableTracy($appDir . '/log');

        $configurator->setTempDirectory($appDir . '/temp');

        $configurator->createRobotLoader()
            ->addDirectory(__DIR__)
            ->register();

        $configurator->addConfig($appDir . '/config/common.neon');
        $configurator->addConfig($appDir . '/config/services.neon');
        $configurator->addConfig($appDir . '/config/local.neon');

        $container = $configurator->createContainer();

    }
}
