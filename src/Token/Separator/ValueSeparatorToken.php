<?php

namespace Wimulkeman\JsonParser\Token\Separator;

use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\SeparatorScannableToken;

class ValueSeparatorToken extends SeparatorScannableToken
{
    protected string $lexeme = ',';

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
            OpenListSeparatorToken::class,
        ];
    }
}
