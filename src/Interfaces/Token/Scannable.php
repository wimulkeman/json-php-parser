<?php

namespace Wimulkeman\JsonParser\Interfaces\Token;

use Wimulkeman\JsonParser\Token\ScannableToken;

interface Scannable
{
    public function scan($stream): ?ScannableToken;
}
