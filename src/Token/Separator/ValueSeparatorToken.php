<?php

namespace Wimulkeman\JsonParser\Token\Separator;

use Wimulkeman\JsonParser\Token\SeparatorScannableToken;

class ValueSeparatorToken extends SeparatorScannableToken
{
    protected string $lexeme = ',';
}