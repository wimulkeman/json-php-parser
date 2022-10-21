<?php

namespace Wimulkeman\JsonParser\Exception;

use LogicException;
use Throwable;

class MissingDynamicScanImplementation extends LogicException
{
    public function __construct($code = 0, Throwable $previous = null)
    {
        parent::__construct(
            'The token uses dynamic lexeme length and therefore should implement an own scan method',
            $code,
            $previous
        );
    }
}