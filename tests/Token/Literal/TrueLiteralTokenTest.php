<?php

namespace Tests\Token\Literal;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\ScannableToken;

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
