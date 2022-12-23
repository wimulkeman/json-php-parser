<?php

namespace Wimulkeman\JsonParser\Lexer;

use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;

class LiteralLexer extends AbstractLexer
{
    protected function getLexers(): array
    {
        return [
            new TrueLiteralToken(),
            new FalseLiteralToken(),
            new NullLiteralToken(),
        ];
    }
}
