<?php

namespace Tests\Lexer;

use RuntimeException;
use Wimulkeman\JsonParser\Lexer\IdentifierLexer;
use PHPUnit\Framework\TestCase;
use Wimulkeman\JsonParser\Lexer\LiteralLexer;
use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\LiteralScannableToken;

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
