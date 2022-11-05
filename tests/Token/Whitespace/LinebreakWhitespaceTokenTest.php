<?php

namespace Tests\Token\Whitespace;

use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Token\Whitespace\LinebreakWhitespaceToken;
use Tests\Token\AbstractScanTokenTest;

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
