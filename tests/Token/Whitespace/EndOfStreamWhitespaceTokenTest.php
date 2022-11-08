<?php

namespace Tests\Token\Whitespace;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;

class EndOfStreamWhitespaceTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new EndOfStreamWhitespaceToken();
    }

    public function getTestString(): string
    {
        return '';
    }
}
