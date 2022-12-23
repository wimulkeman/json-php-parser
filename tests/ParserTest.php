<?php

namespace Tests;

use Wimulkeman\JsonParser\Interfaces\Token\GrammerSupport;
use Wimulkeman\JsonParser\Parser;
use PHPUnit\Framework\TestCase;
use Wimulkeman\JsonParser\Scanner;
use Wimulkeman\JsonParser\Token\AbstractToken;
use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;
use Wimulkeman\JsonParser\Token\Whitespace\StartOfStreamWhitespaceToken;

class ParserTest extends TestCase
{
    use StreamTrait;

    private Parser $parser;

    public function setUp(): void
    {
        $this->parser = new Parser(new Scanner());
    }

    /**
     * @dataProvider provideTokenSequences
     */
    public function testItValidatesGrammerForSequences(GrammerSupport $currentToken, GrammerSupport $previousToken, bool $outcome): void
    {
        $this->assertSame($outcome, $this->parser->checkGrammer($currentToken, $previousToken));
    }

    public function provideTokenSequences(): array
    {
        return [
            [
                new IdentifierScannableToken(),
                new StartOfStreamWhitespaceToken(),
                true,
            ],
            [
                new TrueLiteralToken(),
                new FalseLiteralToken(),
                false,
            ],
            [
                new EndOfStreamWhitespaceToken(),
                new StartOfStreamWhitespaceToken(),
                true,
            ],
        ];
    }
}
