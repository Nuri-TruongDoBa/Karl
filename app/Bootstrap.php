<?php

declare(strict_types=1);

namespace App;

use Inc\Registry;
use Inc\Route;

class Bootstrap
{
    private $router;

    function __construct($config)
    {
        $this->router = new Route();
        Registry::getInstance()->config = $config;
    }

    public function run()
    {
        $this->router->run();
    }
}
