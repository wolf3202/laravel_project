<?php

namespace App\Exceptions;

use Exception;

class UploadImageException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
