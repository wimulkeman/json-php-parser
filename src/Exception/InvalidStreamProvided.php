<?php

namespace Wimulkeman\JsonParser\Exception;

use RuntimeException;
use Throwable;

class InvalidStreamProvided extends RuntimeException
{
    public function __construct(int $code = 0, Throwable $previous = null)
    {
        parent::__construct('The provided resource should be of the type stream', $code, $previous);
    }
}
