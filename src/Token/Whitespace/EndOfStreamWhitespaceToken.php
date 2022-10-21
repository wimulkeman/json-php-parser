<?php

namespace Wimulkeman\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class EndOfStreamWhitespaceToken extends WhitespaceScannableToken
{
    protected string $lexeme = '';
}