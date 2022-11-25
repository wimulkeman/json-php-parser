<?php

namespace Tests\Token;

use Wimulkeman\JsonParser\Token\OperatorScannableToken;
use Wimulkeman\JsonParser\Token\ScannableToken;

class OperatorScannableTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new OperatorScannableToken();
    }

    public function getTestString(): string
    {
        return ':';
    }
}
