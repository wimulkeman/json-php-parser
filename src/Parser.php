<?php

namespace Wimulkeman\JsonParser;

use Wimulkeman\JsonParser\Exception\JsonParserException;
use Wimulkeman\JsonParser\Interfaces\Token\GrammerSupport;
use Wimulkeman\JsonParser\Token\Whitespace\StartOfStreamWhitespaceToken;

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
            $this->checkGrammer($currentToken, $previousToken);

            $previousToken = $currentToken;
        }
    }

    /**
     * @throws JsonParserException
     */
    public function checkGrammer(GrammerSupport $currentToken, GrammerSupport $previousToken): bool
    {
        if ($currentToken::acceptsAllTokens()) {
            return true;
        }

        return in_array(get_class($currentToken), $previousToken::supportedNextTokens(), true);
    }
}