<?php

declare(strict_types=1);

namespace App\Middleware;

abstract class MiddlewareAbstract 
{
    protected $next = true;
    
    abstract public function action();
}
