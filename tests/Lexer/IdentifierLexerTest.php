<?php

namespace Tests\Lexer;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Wimulkeman\JsonParser\Lexer\IdentifierLexer;
use Wimulkeman\JsonParser\Token\IdentifierScannableToken;

class IdentifierLexerTest extends TestCase
{
    public function testItScansTheDifferentTypesOfLanguageLiterals(): void
    {
        $identifierStream = $this->createStream('"test"');
        $invalidStream = $this->createStream('invalid-value');

        $lexer = new IdentifierLexer();
        $this->assertInstanceOf(IdentifierScannableToken::class, $lexer->scan($identifierStream));
        $this->assertNull($lexer->scan($invalidStream));
    }

    /**
     * @return resource
     */
    protected function createStream(string $text)
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
