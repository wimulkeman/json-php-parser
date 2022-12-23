<?php

namespace Wimulkeman\JsonParser\Exception;

use RuntimeException;
use Throwable;

class UntokenizableString extends RuntimeException
{
    public function __construct(int $code = 0, Throwable $previous = null)
    {
        parent::__construct('The input could not be tokenized', $code, $previous);
    }
}
