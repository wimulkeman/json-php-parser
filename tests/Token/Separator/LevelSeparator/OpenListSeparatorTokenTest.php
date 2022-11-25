<?php

namespace Tests\Token\Separator\LevelSeparator;

use Tests\Token\AbstractScanTokenTest;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;

class OpenListSeparatorTokenTest extends AbstractScanTokenTest
{
    public function initToken(): LevelSeparatorToken
    {
        return new OpenListSeparatorToken();
    }

    public function testItIsOpeningToken(): void
    {
        $this->assertTrue($this->initToken()->isOpening());
        $this->assertFalse($this->initToken()->isClosing());
    }

    public function testItKnowsItsClossingCounterPart(): void
    {
        $this->assertSame(CloseListSeparatorToken::class, $this->initToken()->counterPart());
    }

    public function getTestString(): string
    {
        return "[";
    }
}
