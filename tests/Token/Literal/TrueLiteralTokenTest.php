<?php

namespace WimUlkeman\Tests\JsonParser\Token\Literal;

use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;
use WimUlkeman\Tests\JsonParser\Token\AbstractScanTokenTest;

class TrueLiteralTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new TrueLiteralToken();
    }

    public function getTestString(): string
    {
        return 'true';
    }
}
