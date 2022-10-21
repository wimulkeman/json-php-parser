<?php

namespace WimUlkeman\Tests\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;
use WimUlkeman\Tests\JsonParser\Token\AbstractScanTokenTest;

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
