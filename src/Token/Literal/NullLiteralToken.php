<?php

namespace Wimulkeman\JsonParser\Token\Literal;

use Wimulkeman\JsonParser\Token\LiteralScannableToken;

class NullLiteralToken extends LiteralScannableToken
{
    protected string $lexeme = 'null';
}