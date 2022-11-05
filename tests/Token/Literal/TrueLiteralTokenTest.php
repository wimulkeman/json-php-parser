<?php

namespace Tests\Token\Literal;

use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Tests\Token\AbstractScanTokenTest;

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
