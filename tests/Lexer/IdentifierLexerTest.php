<?php

namespace Tests\Lexer;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Tests\StreamTrait;
use Wimulkeman\JsonParser\Lexer\IdentifierLexer;
use Wimulkeman\JsonParser\Token\IdentifierScannableToken;

class IdentifierLexerTest extends TestCase
{
    use StreamTrait;

    public function testItScansTheDifferentTypesOfLanguageLiterals(): void
    {
        $identifierStream = $this->createStream('"test"');
        $invalidStream = $this->createStream('invalid-value');

        $lexer = new IdentifierLexer();
        $this->assertInstanceOf(IdentifierScannableToken::class, $lexer->scan($identifierStream));
        $this->assertNull($lexer->scan($invalidStream));
    }
}
