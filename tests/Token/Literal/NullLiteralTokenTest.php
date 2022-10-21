<?php

namespace WimUlkeman\Tests\JsonParser\Token\Literal;

use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;
use WimUlkeman\Tests\JsonParser\Token\AbstractScanTokenTest;

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
