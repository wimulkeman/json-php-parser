<?php

namespace Wimulkeman\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class SpaceWhitespaceToken extends WhitespaceScannableToken
{
    protected string $lexeme = ' ';
}