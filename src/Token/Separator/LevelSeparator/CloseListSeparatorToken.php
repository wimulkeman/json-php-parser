<?php

namespace Wimulkeman\JsonParser\Token\Separator\LevelSeparator;

use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\ValueSeparatorToken;
use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;

class CloseListSeparatorToken extends LevelSeparatorToken
{
    protected string $lexeme = ']';

    public function isOpening(): bool
    {
        return false;
    }

    public function isClosing(): bool
    {
        return true;
    }

    public static function counterPart(): string
    {
        return OpenListSeparatorToken::class;
    }

    public static function supportedNextTokens(): array
    {
        return [
            EndOfStreamWhitespaceToken::class,
            ValueSeparatorToken::class,
        ];
    }

    public static function supportedLevelTokens(): array
    {
        return [static::counterPart()];
    }
}