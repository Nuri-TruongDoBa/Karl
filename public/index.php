<?php

declare(strict_types=1);

use App\Bootstrap;

require_once '../inc/Autoloader.php';

$config = require_once '../config/env.php';
date_default_timezone_set($config['timezone']);

try {
    new Autoloader();
    $bootstrap = new Bootstrap($config);
    $bootstrap->run();
} catch (\Exception $e) {
    throw new \Exception($e->getMessage(), 1);
}