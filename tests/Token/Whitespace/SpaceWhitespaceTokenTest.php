<?php

namespace Tests\Token\Whitespace;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Token\Whitespace\SpaceWhitespaceToken;

class SpaceWhitespaceTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new SpaceWhitespaceToken();
    }

    public function getTestString(): string
    {
        return " ";
    }
}
