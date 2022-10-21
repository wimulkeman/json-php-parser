<?php

namespace WimUlkeman\Tests\JsonParser\Token\Literal;

use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;
use WimUlkeman\Tests\JsonParser\Token\AbstractScanTokenTest;

class FalseLiteralTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new FalseLiteralToken();
    }

    public function getTestString(): string
    {
        return 'false';
    }
}
