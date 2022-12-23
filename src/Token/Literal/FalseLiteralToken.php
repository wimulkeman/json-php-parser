<?php

namespace Wimulkeman\JsonParser\Token\Literal;

use Wimulkeman\JsonParser\Token\LiteralScannableToken;

class FalseLiteralToken extends LiteralScannableToken
{
    protected string $lexeme = 'false';
}