<?php

namespace Wimulkeman\JsonParser\Exception;

use RuntimeException;
use Throwable;

class ContentNotAString extends RuntimeException
{
    public function __construct($code = 0, Throwable $previous = null)
    {
        parent::__construct('The fetched content from the file was expected to be a string', $code, $previous);
    }
}