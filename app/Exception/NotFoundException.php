<?php

declare(strict_types=1);

namespace App\Exception;

class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;

    public function __construct()
    {
        return parent::__construct($this->message, $this->code);
    }
}
