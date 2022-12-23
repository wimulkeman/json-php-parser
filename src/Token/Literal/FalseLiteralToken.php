<?php

namespace Wimulkeman\JsonParser\Token\Literal;

use Wimulkeman\JsonParser\Token\LiteralScannableToken;
use Wimulkeman\JsonParser\Token\Separator\ValueSeparatorToken;
use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;

class FalseLiteralToken extends LiteralScannableToken
{
    protected string $lexeme = 'false';
}