<?php

namespace Wimulkeman\JsonParser\Lexer;

use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\ValueSeparatorToken;

class SeparatorLexer extends AbstractLexer
{
    protected function getLexers(): array
    {
        return [
            new ValueSeparatorToken(),
            new OpenListSeparatorToken(),
            new CloseListSeparatorToken(),
            new OpenObjectSeparatorToken(),
            new CloseObjectSeparatorToken(),
        ];
    }
}