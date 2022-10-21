<?php

namespace WimUlkeman\Tests\JsonParser\Token\Whitespace;

use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Token\Whitespace\LinebreakWhitespaceToken;
use WimUlkeman\Tests\JsonParser\Token\AbstractScanTokenTest;

class LinebreakWhitespaceTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new LinebreakWhitespaceToken();
    }

    public function getTestString(): string
    {
        return "\n";
    }
}
