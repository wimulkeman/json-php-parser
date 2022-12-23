<?php

namespace Wimulkeman\JsonParser\Token\Separator\LevelSeparator;

use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;

class OpenListSeparatorToken extends LevelSeparatorToken
{
    protected string $lexeme = '[';

    public function isOpening(): bool
    {
        return true;
    }

    public function isClosing(): bool
    {
        return false;
    }

    public static function counterPart(): string
    {
        return CloseListSeparatorToken::class;
    }

    public static function supportedNextTokens(): array
    {
        return [
            IdentifierScannableToken::class,
            FalseLiteralToken::class,
            NullLiteralToken::class,
            TrueLiteralToken::class,
            OpenObjectSeparatorToken::class,
            __CLASS__,
            static::counterPart(),
        ];
    }

    public static function supportedLevelTokens(): array
    {
        return [];
    }
}
