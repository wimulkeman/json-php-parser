<?php

namespace Wimulkeman\JsonParser\Token\Separator\LevelSeparator;

use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;

class CloseObjectSeparatorToken extends LevelSeparatorToken
{
    protected string $lexeme = '}';

    public function isOpening(): bool
    {
        return false;
    }

    public function isClosing(): bool
    {
        return true;
    }

    public function counterPart(): string
    {
        return OpenObjectSeparatorToken::class;
    }
}