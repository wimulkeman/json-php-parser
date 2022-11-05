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

    public function scannerInput(): array
    {
        return [
            [
                '{',
                null,
            ],
            [
                '"test"',
                'test',
            ],
            [
                '"foo bar"',
                'foo bar',
            ],
            [
                '"\\\\"',
                '\\',
            ],
            [
                '"15\\" wheels"',
                '15" wheels',
            ],
            [
                '"15\\" wheels \\\\ special livery"',
                '15" wheels \\ special livery',
            ],
            [
                '"test""foo"',
                'test',
            ]
        ];
    }
}
