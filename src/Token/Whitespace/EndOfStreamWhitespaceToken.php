<?php

namespace Wimulkeman\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class EndOfStreamWhitespaceToken extends WhitespaceScannableToken
{
    protected string $lexeme = '';

    public static function supportedNextTokens(): array
    {
        return [];
    }

    public static function supportedLevelTokens(): array
    {
        return [];
    }
}