<?php

namespace Wimulkeman\JsonParser\Token\Literal;

use Wimulkeman\JsonParser\Token\LiteralScannableToken;

class TrueLiteralToken extends LiteralScannableToken
{
    protected string $lexeme = 'true';
}