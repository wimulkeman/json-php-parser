<?php

namespace Tests;

use Wimulkeman\JsonParser\Exception\Parser\InvalidGrammerSequence;
use Wimulkeman\JsonParser\Interfaces\Token\GrammerSupport;
use Wimulkeman\JsonParser\Parser;
use PHPUnit\Framework\TestCase;
use Wimulkeman\JsonParser\Scanner;
use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\OperatorScannableToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;
use Wimulkeman\JsonParser\Token\Whitespace\SpaceWhitespaceToken;
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

    public function testItThrowsAnExceptionOnParsingInvalidGrammerSequences(): void
    {
        $this->expectException(InvalidGrammerSequence::class);

        $stream = $this->createStream('{false}');

        $this->parser->parse($stream);
    }

    public function testItIgnoresWhitespaceTokensWhileParsingForWhitespaceTokensAcceptEverything(): void
    {
        $parser = new Parser(
            new Scanner(
                [
                    Scanner::STRIP_WHITESPACES => false,
                ]
            )
        );

        $this->expectException(InvalidGrammerSequence::class);

        $stream = $this->createStream('{ false }');

        $parser->parse($stream);
    }

    public function provideTokenSequences(): array
    {
        return [
            '"Identifier" is permitted after "Stream: Start"' => [
                new IdentifierScannableToken(),
                new StartOfStreamWhitespaceToken(),
                true,
            ],
            '"Literal: True" is "not" permitted after "Literal: False"' => [
                new TrueLiteralToken(),
                new FalseLiteralToken(),
                false,
            ],
            '"Stream: End" is permitted after "Stream: Start"' => [
                new EndOfStreamWhitespaceToken(),
                new StartOfStreamWhitespaceToken(),
                true,
            ],
            '"All tokens" are permitted after "Whitespace: Space"' => [
                new OperatorScannableToken(),
                new SpaceWhitespaceToken(),
                true,
            ],
            '"All tokens" are permitted before "Whitespace: Space"' => [
                new SpaceWhitespaceToken(),
                new OperatorScannableToken(),
                true,
            ],
            '"Literal: False" is "not" permitted after "Object opening"' => [
                new FalseLiteralToken(),
                new OpenObjectSeparatorToken(),
                false,
            ],
            '"Literal: False" is permitted after "Whitespace: Space"' => [
                new FalseLiteralToken(),
                new SpaceWhitespaceToken(),
                true,
            ],
            '"List: Object Open" is permitted after "Stream: Start"' => [
                new OpenObjectSeparatorToken(),
                new StartOfStreamWhitespaceToken(),
                true,
            ],
            '"List: Object Close" is permitted after "Identifier"' => [
                new CloseObjectSeparatorToken(),
                new IdentifierScannableToken(),
                true,
            ],
            '"List: List Close" is permitted after "Identifier"' => [
                new CloseListSeparatorToken(),
                new IdentifierScannableToken(),
                true,
            ],
        ];
    }
}
