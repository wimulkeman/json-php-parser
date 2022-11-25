<?php

namespace Tests\Token;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Tests\StreamTrait;
use Wimulkeman\JsonParser\Interfaces\Token\Scannable;
use Wimulkeman\JsonParser\Token\ScannableToken;

abstract class AbstractScanTokenTest extends TestCase
{
    use StreamTrait;

    abstract public function initToken(): ScannableToken;

    abstract public function getTestString(): string;

    final public function testItParsesTheLexeme(): void
    {
        $token = $this->initToken();

        $stream = $this->createStream($this->getTestString());
        $result = $token->scan($stream);

        $this->assertInstanceOf(get_class($token), $result);
    }

    final public function testItReturnsNullForNonSupportedStrings(): void
    {
        $stream = $this->createStream('invalid-value');
        $token = $this->initToken()->scan($stream);

        $this->assertNull($token);
    }

    final public function testItImplementsTheScannableInterface(): void
    {
        $this->assertInstanceOf(Scannable::class, $this->initToken());
    }
}