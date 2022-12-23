<?php

namespace Wimulkeman\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class LinebreakWhitespaceToken extends WhitespaceScannableToken
{
    protected string $lexeme = "\n";

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