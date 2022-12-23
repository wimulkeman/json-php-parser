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
    public function supportedNextTokens(): array
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

    public function supportedLevelTokens(): array
    {
        return [];
    }

    public function acceptsAllTokens(): bool
    {
        return false;
    }
}