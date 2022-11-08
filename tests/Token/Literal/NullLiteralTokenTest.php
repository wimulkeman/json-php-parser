<?php

namespace Tests\Token\Literal;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;

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
