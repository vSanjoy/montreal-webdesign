<?php

namespace App\Exceptions;

use Exception;

class ParamMissingException extends Exception{
	public function __construct($message = 'Parameter missing', $code = 3040, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}