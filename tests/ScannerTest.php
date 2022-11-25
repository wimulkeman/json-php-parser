<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Wimulkeman\JsonParser\Scanner;
use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\Literal\FalseLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\NullLiteralToken;
use Wimulkeman\JsonParser\Token\Literal\TrueLiteralToken;
use Wimulkeman\JsonParser\Token\OperatorScannableToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\CloseObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenListSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparator\OpenObjectSeparatorToken;
use Wimulkeman\JsonParser\Token\Separator\ValueSeparatorToken;
use Wimulkeman\JsonParser\Token\Whitespace\EndOfStreamWhitespaceToken;
use Wimulkeman\JsonParser\Token\Whitespace\LinebreakWhitespaceToken;
use Wimulkeman\JsonParser\Token\Whitespace\SpaceWhitespaceToken;

class ScannerTest extends TestCase
{
    public function testItScansAndReturnsTheDifferentLanguageConstructsInSequenceOfEncountered(): void
    {
        $text = 'truetruefalsenull';

        $stream = $this->createStream($text);

        $scanner = new Scanner();

        $tokens = $scanner->scan($stream);

        $expectedTokens = [
            TrueLiteralToken::class,
            TrueLiteralToken::class,
            FalseLiteralToken::class,
            NullLiteralToken::class,
        ];

        foreach ($tokens as $token) {
            $this->assertInstanceOf(array_shift($expectedTokens), $token);
        }

        $this->assertCount(0, $expectedTokens);
    }

    public function testScanWithWhitespacesReturnedThroughSettingOptions(): void
    {
        $text = "false\nnull";

        $stream = $this->createStream($text);

        $scanner = new Scanner();
        $scanner->setOption(Scanner::STRIP_WHITESPACES, false);

        $tokens = $scanner->scan($stream);

        $expectedTokens = [
            FalseLiteralToken::class,
            LinebreakWhitespaceToken::class,
            NullLiteralToken::class,
            EndOfStreamWhitespaceToken::class,
        ];

        foreach ($tokens as $token) {
            $this->assertInstanceOf(array_shift($expectedTokens), $token);
        }

        $this->assertCount(0, $expectedTokens);
    }

    public function testScanWithIdentifierAndLiteralTokens(): void
    {
        $text = 'false"test"null"15 \\" wheels""foo": "value"';

        $stream = $this->createStream($text);

        $scanner = new Scanner();
        $scanner->setOption(Scanner::STRIP_WHITESPACES, false);

        $tokens = $scanner->scan($stream);

        $expectedTokens = [
            FalseLiteralToken::class,
            IdentifierScannableToken::class,
            NullLiteralToken::class,
            IdentifierScannableToken::class,
            IdentifierScannableToken::class,
            OperatorScannableToken::class,
            SpaceWhitespaceToken::class,
            IdentifierScannableToken::class,
            EndOfStreamWhitespaceToken::class,
        ];

        foreach ($tokens as $token) {
            $this->assertInstanceOf(array_shift($expectedTokens), $token);
        }

        $this->assertCount(0, $expectedTokens);
    }

    public function testScanSeparatorTokens()
    {
        $text = ',[]{}';

        $stream = $this->createStream($text);

        $scanner = new Scanner();

        $tokens = $scanner->scan($stream);

        $expectedTokens = [
            ValueSeparatorToken::class,
            OpenListSeparatorToken::class,
            CloseListSeparatorToken::class,
            OpenObjectSeparatorToken::class,
            CloseObjectSeparatorToken::class,
        ];

        foreach ($tokens as $token) {
            $this->assertInstanceOf(array_shift($expectedTokens), $token);
        }

        $this->assertCount(0, $expectedTokens);
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
