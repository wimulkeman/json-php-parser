<?php

namespace Tests\Lexer;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Wimulkeman\JsonParser\Lexer\LiteralLexer;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;

class LiteralLexerTest extends TestCase
{
    public function testItScansTheDifferentTypesOfLanguageLiterals(): void
    {
        $falseStream = $this->createStream('false');
        $trueStream = $this->createStream('true');
        $nullStream = $this->createStream('null');
        $invalidStream = $this->createStream('invalid-value');

        $lexer = new LiteralLexer();
        $this->assertInstanceOf(FalseLiteralToken::class, $lexer->scan($falseStream));
        $this->assertInstanceOf(TrueLiteralToken::class, $lexer->scan($trueStream));
        $this->assertInstanceOf(NullLiteralToken::class, $lexer->scan($nullStream));
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
