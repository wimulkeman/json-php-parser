<?php

namespace Wimulkeman\JsonParser\Exception\Parser;

use Wimulkeman\JsonParser\Exception\JsonParserException;
use Wimulkeman\JsonParser\Token\AbstractToken;

class MissingLevelOpener extends JsonParserException
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
        $error .= sprintf("This character is only allowed in a level started with the following charachters [%s]\n", implode(', ', $currentToken::supportedLevelTokens()));
        $error .= sprintf("The error occurred on the following sequence:\n%s%s\n", $previousLexeme, $currentLexeme);
        $error .= sprintf('%s/\\', str_repeat(' ', strlen($previousLexeme) - 1));

        return $error;
    }
}