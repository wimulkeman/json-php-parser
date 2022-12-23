<?php

namespace Wimulkeman\JsonParser\Token\Separator\LevelSeparator;

use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;

class OpenObjectSeparatorToken extends LevelSeparatorToken
{
    protected string $lexeme = '{';

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
        return CloseObjectSeparatorToken::class;
    }

    public static function supportedNextTokens(): array
    {
        return [
            IdentifierScannableToken::class,
            static::counterPart(),
        ];
    }

    public static function supportedLevelTokens(): array
    {
        return [];
    }
}