<?php

namespace Tests\Token\Literal;

use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Tests\Token\AbstractScanTokenTest;

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
