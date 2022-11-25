<?php

namespace Tests\Token\Separator;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Token\Separator\ValueSeparatorToken;

class ValueSeparatorTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new ValueSeparatorToken();
    }

    public function getTestString(): string
    {
        return ',';
    }
}
