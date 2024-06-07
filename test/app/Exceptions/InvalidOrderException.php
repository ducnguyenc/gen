<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidOrderException extends HttpException
{
    public function __construct()
    {
        parent::__construct(404, 'abc');
    }
}
