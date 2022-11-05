<?php

namespace Tests\Token\Literal;

use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Tests\Token\AbstractScanTokenTest;

class NullLiteralTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new NullLiteralToken();
    }

    public function getTestString(): string
    {
        return 'null';
    }
}
