<?php

namespace Tests\Token\Literal;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;

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
