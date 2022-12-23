<?php

namespace Wimulkeman\JsonParser\Exception\Parser;

use Wimulkeman\JsonParser\Exception\JsonParserException;
use Wimulkeman\JsonParser\Token\AbstractToken;

class InvalidGrammerSequence extends JsonParserException
{
    public function __construct(AbstractToken $currentToken, AbstractToken $previousToken)
    {
        parent::__construct(
            $this->createErrorMessage($currentToken, $previousToken)
        );
    }

    private function createErrorMessage(AbstractToken $currentToken, AbstractToken $previousToken): string
    {
        $previousLexeme = $previousToken->getLexeme();
        if (strlen($previousLexeme) === 0) {
            $previousLexeme = ' ';
        }

        $currentLexeme = $currentToken->getLexeme();

        $error = sprintf("Invalid character found at position %s.\n", $currentToken->getPointerStart());
        $error .= sprintf("The allowed characters are [%s]\n", implode(', ', $previousToken::supportedNextTokens()));
        $error .= sprintf("The error occurred on the following sequence:\n%s%s\n", $previousLexeme, $currentLexeme);
        $error .= sprintf('%s/\\', str_repeat(' ', strlen($previousLexeme) - 1));

        return $error;
    }
}