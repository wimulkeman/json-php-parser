<?php

namespace Wimulkeman\JsonParser\Lexer;

use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;
use Wimulkeman\JsonParser\Token\Whitespace\LinebreakWhitespaceToken;

class WhitespaceLexer extends AbstractLexer
{
    protected function getLexers(): array
    {
        return [
            new LinebreakWhitespaceToken(),
            new EndOfStreamWhitespaceToken(),
        ];
    }
}