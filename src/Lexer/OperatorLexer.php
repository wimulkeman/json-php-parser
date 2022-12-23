<?php

namespace Wimulkeman\JsonParser\Lexer;

use Wimulkeman\JsonParser\Token\OperatorScannableToken;

class OperatorLexer extends AbstractLexer
{
    protected function getLexers(): array
    {
        return [
            new OperatorScannableToken(),
        ];
    }
}
