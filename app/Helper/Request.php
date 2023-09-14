<?php

declare(strict_types=1);

namespace App\Helper;

class Request
{
    public static function get($field)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        return $data[$field] ? (gettype($data[$field]) !== 'string' ? $data[$field] : htmlspecialchars($data[$field])) : '';
    }
}
