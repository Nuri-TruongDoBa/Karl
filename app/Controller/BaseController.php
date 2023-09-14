<?php

declare(strict_types=1);

namespace App\Controller;

use Inc\Registry;

class BaseController
{
    public function redirect($url, $isEnd = true, $responseCode = 302)
    {
        header('Location:' . $url, true, $responseCode);
        if ($isEnd)
            die();
    }

    public function view($view, $data = null)
    {
        $view = strtolower($view);

        if (is_array($data)) {
            extract($data, EXTR_PREFIX_SAME, "data");
        } else {
            $data = $data;
        }

        $viewPath = '../views/' . $view . '.php';
        if (file_exists($viewPath)) {
            require($viewPath);
        }
    }

    public function middleware($middlewareName = [])
    {
        foreach ($middlewareName as $name) {
            $class = 'App\Middleware\\' . ucfirst(trim($name)) . 'Middleware';
            if (class_exists($class)) {
                Registry::getInstance()->middleware = $class;
                $middleware = new $class;
                $middleware->action();
            }
        }
    }
}
