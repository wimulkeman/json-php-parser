<?php

namespace Wimulkeman\JsonParser;

use Wimulkeman\JsonParser\Exception\JsonParserException;
use Wimulkeman\JsonParser\Exception\Parser\InvalidGrammerSequence;
use Wimulkeman\JsonParser\Interfaces\Token\GrammerSupport;
use Wimulkeman\JsonParser\Token\Whitespace\StartOfStreamWhitespaceToken;
use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class Parser
{
    private Scanner $scanner;

    public function __construct(Scanner $scanner)
    {
        $this->scanner = $scanner;
    }

    /**
     * @param resource $stream
     * @return void
     */
    public function parse($stream): void
    {
        $tokens = $this->scanner->scan($stream);

        $previousToken = new StartOfStreamWhitespaceToken();
        foreach ($tokens as $currentToken) {
            if (false === $this->checkGrammer($currentToken, $previousToken)) {
                throw new InvalidGrammerSequence($currentToken, $previousToken);
            }

            if (!$currentToken instanceof WhitespaceScannableToken) {
                $previousToken = $currentToken;
            }
        }
    }

    /**
     * @throws JsonParserException
     */
    public function checkGrammer(GrammerSupport $currentToken, GrammerSupport $previousToken): bool
    {
        if ($currentToken instanceof WhitespaceScannableToken
            || $previousToken instanceof WhitespaceScannableToken
        ) {
            return true;
        }

        return in_array(get_class($currentToken), $previousToken::supportedNextTokens(), true);
    }
}