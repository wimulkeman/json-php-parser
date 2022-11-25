<?php

namespace Tests\Lexer;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Tests\StreamTrait;
use Wimulkeman\JsonParser\Lexer\LiteralLexer;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;

class LiteralLexerTest extends TestCase
{
    use StreamTrait;

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
}
