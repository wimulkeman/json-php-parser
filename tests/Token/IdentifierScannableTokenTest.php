<?php

namespace Tests\Token;

use Wimulkeman\JsonParser\Token\IdentifierScannableToken;
use Wimulkeman\JsonParser\Token\ScannableToken;

class IdentifierScannableTokenTest extends AbstractScanTokenTest
{
    public function initToken(): ScannableToken
    {
        return new IdentifierScannableToken();
    }

    public function getTestString(): string
    {
        return '"foo"';
    }

    /**
     * @dataProvider scannerInput
     */
    public function testScannerLexemeResult(string $input, ?string $expected): void
    {
        $token = $this->initToken();
        $result = $token->scan($this->createStream($input));

        if (null === $expected) {
            $this->assertNull($result);

            return;
        }

        $this->assertNotNull($result);
        $this->assertEquals($expected, $result->getLexeme());
    }

    /**
     * @return array<string, array<int, string|null>>
     */
    public function scannerInput(): array
    {
        return [
            'non-identifier input' => [
                '{',
                null,
            ],
            'identifier input with one word' => [
                '"test"',
                'test',
            ],
            'identifier input with two words' => [
                '"foo bar"',
                'foo bar',
            ],
            'escaping escape symbol' => [
                '"\\\\"',
                '\\',
            ],
            'escaping wrapping symbol' => [
                '"15\\" wheels"',
                '15" wheels',
            ],
            'escaping escape and wrapping symbol' => [
                '"15\\" wheels \\\\ special livery"',
                '15" wheels \\ special livery',
            ],
            'only scanning for the first identifier' => [
                '"test""foo"',
                'test',
            ],
        ];
    }
}
