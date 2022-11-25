<?php

namespace Tests\Token\Separator\LevelSeparator;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;

class CloseListSeparatorTokenTest extends AbstractScanTokenTest
{
    public function initToken(): LevelSeparatorToken
    {
        return new CloseListSeparatorToken();
    }

    public function testItIsOpeningToken(): void
    {
        $this->assertFalse($this->initToken()->isOpening());
        $this->assertTrue($this->initToken()->isClosing());
    }

    public function testItKnowsItsClossingCounterPart(): void
    {
        $this->assertSame(OpenListSeparatorToken::class, $this->initToken()->counterPart());
    }

    public function getTestString(): string
    {
        return "]";
    }
}
