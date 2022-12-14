<?php

namespace Wimulkeman\JsonParser\Token;

use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\ValueSeparatorToken;
use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;

abstract class LiteralScannableToken extends ScannableToken
{
    public static function supportedNextTokens(): array
    {
        return [
            EndOfStreamWhitespaceToken::class,
            ValueSeparatorToken::class,
            CloseObjectSeparatorToken::class,
            CloseListSeparatorToken::class,
        ];
    }

    public static function supportedLevelTokens(): array
    {
        return [];
    }
}
