<?php

namespace WimUlkeman\Tests\JsonParser\Token;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Wimulkeman\JsonParser\Interfaces\Token\Scannable;
use Wimulkeman\JsonParser\Token\ScannableToken;

abstract class AbstractScanTokenTest extends TestCase
{
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

    /**
     * @return resource
     */
    final protected function createStream(string $text)
    {
        $stream = fopen('php://memory', 'rb+');
        fwrite($stream, $text);
        rewind($stream);

        if (false === $stream) {
            throw new RuntimeException('In memory stream could not be created for the test');
        }

        return $stream;
    }
}