<?php

namespace Wimulkeman\JsonParser\Lexer;

use Wimulkeman\JsonParser\Token\IdentifierScannableToken;

class IdentifierLexer extends AbstractLexer
{
    protected function getLexers(): array
    {
        return [
            new IdentifierScannableToken(),
        ];
    }
}
