<?php

namespace Tests\Token\Whitespace;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Token\Whitespace\LinebreakWhitespaceToken;

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
