<?php

declare(strict_types=1);

class Autoloader
{
    function __construct()
    {
        spl_autoload_register([$this, 'autoload']);
        self::fileLoader();
    }

    private function autoload($className)
    {
        $className = preg_replace('/^\\$/', '/', $className);
        $className = explode('/', $className);
        $c = array_pop($className);
        $filePath = '../'.strtolower(implode('/', $className)).'/'.$c.'.php';
        if(file_exists($filePath)) {
            require_once $filePath;
        }
    }

    private function fileLoader()
    {
        foreach (self::getFileLoad() as $file) {
            $file = __DIR__ . '/../' . $file;
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }

    private static function getFileLoad()
    {
        return [
            'config/const.php',
            'routes/route.php'
        ];
    }
}
