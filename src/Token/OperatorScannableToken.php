<?php

namespace Wimulkeman\JsonParser\Token;

use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenObjectSeparatorToken;

class OperatorScannableToken extends ScannableToken
{
    protected string $lexeme = ':';

    public static function supportedNextTokens(): array
    {
        return [
            IdentifierScannableToken::class,
            OpenObjectSeparatorToken::class,
            OpenListSeparatorToken::class,
        ];
    }

    public static function supportedLevelTokens(): array
    {
        return [
            OpenObjectSeparatorToken::class,
        ];
    }
}
