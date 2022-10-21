<?php

namespace Wimulkeman\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class LinebreakWhitespaceToken extends WhitespaceScannableToken
{
    protected string $lexeme = "\n";
}