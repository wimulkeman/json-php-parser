<?php

namespace Wimulkeman\JsonParser\Token\Separator\LevelSeparator;

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

    public function counterPart(): string
    {
        return CloseListSeparatorToken::class;
    }
}