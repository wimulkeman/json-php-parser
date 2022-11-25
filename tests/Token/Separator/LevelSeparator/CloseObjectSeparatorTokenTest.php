<?php

namespace Tests\Token\Separator\LevelSeparator;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;

class CloseObjectSeparatorTokenTest extends AbstractScanTokenTest
{
    public function initToken(): LevelSeparatorToken
    {
        return new CloseObjectSeparatorToken();
    }

    public function testItIsOpeningToken(): void
    {
        $this->assertFalse($this->initToken()->isOpening());
        $this->assertTrue($this->initToken()->isClosing());
    }

    public function testItKnowsItsClossingCounterPart(): void
    {
        $this->assertSame(OpenObjectSeparatorToken::class, $this->initToken()->counterPart());
    }

    public function getTestString(): string
    {
        return "}";
    }
}
