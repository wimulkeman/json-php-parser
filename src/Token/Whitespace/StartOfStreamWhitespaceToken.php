<?php

namespace Wimulkeman\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\AbstractToken;
use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenObjectSeparatorToken;

class StartOfStreamWhitespaceToken extends AbstractToken
{
    protected string $lexeme = '';

    public static function supportedNextTokens(): array
    {
        return [
            TrueLiteralToken::class,
            FalseLiteralToken::class,
            NullLiteralToken::class,
            IdentifierScannableToken::class,
            OpenObjectSeparatorToken::class,
            OpenListSeparatorToken::class,
            EndOfStreamWhitespaceToken::class,
        ];
    }

    public static function supportedLevelTokens(): array
    {
        return [];
    }

    public static function acceptsAllTokens(): bool
    {
        return false;
    }
}
