<?php

namespace Wimulkeman\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class SpaceWhitespaceToken extends WhitespaceScannableToken
{
    protected string $lexeme = ' ';

    public static function acceptsAllTokens(): bool
    {
        return true;
    }

    public static function supportedNextTokens(): array
    {
        return [];
    }

    public static function supportedLevelTokens(): array
    {
        return [];
    }
}