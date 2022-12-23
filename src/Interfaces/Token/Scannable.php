<?php

namespace Wimulkeman\JsonParser\Interfaces\Token;

use Wimulkeman\JsonParser\Token\ScannableToken;

interface Scannable
{
    /**
     * @param resource $stream
     */
    public function scan($stream): ?ScannableToken;
}
