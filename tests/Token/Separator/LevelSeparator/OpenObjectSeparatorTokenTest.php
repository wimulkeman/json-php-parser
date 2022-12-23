<?php

namespace Tests\Token\Separator\LevelSeparator;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;

class OpenObjectSeparatorTokenTest extends AbstractScanTokenTest
{
    public function initToken(): LevelSeparatorToken
    {
        return new OpenObjectSeparatorToken();
    }

    public function testItIsOpeningToken(): void
    {
        $this->assertTrue($this->initToken()->isOpening());
        $this->assertFalse($this->initToken()->isClosing());
    }

    public function testItKnowsItsClossingCounterPart(): void
    {
        $this->assertSame(CloseObjectSeparatorToken::class, $this->initToken()->counterPart());
    }

    public function getTestString(): string
    {
        return "{";
    }
}
