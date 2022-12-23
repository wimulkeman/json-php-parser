<?php

namespace Wimulkeman\JsonParser\Exception\Parser;

use Wimulkeman\JsonParser\Exception\JsonParserException;
use Wimulkeman\JsonParser\Token\AbstractToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;

class MissingLevelClosing extends JsonParserException
{
    public function __construct(AbstractToken $currentToken, AbstractToken $previousToken, LevelSeparatorToken $openLevelToken)
    {
        parent::__construct(
            $this->createErrorMessage($currentToken, $previousToken, $openLevelToken)
        );
    }

    private function createErrorMessage(AbstractToken $currentToken, AbstractToken $previousToken, LevelSeparatorToken $openLevelToken): string
    {
        $previousLexeme = $previousToken->getLexeme();
        if (strlen($previousLexeme) === 0) {
            $previousLexeme = ' ';
        }

        $currentLexeme = $currentToken->getLexeme();

        $error = sprintf("Invalid character found at position %s.\n", $currentToken->getPointerStart());
        $error .= sprintf("The stream needs has an missing level closing \"%s\"\n", $openLevelToken::counterPart());
        $error .= sprintf("The error occurred on the following sequence:\n%s%s\n", $previousLexeme, $currentLexeme);
        $error .= sprintf('%s/\\', str_repeat(' ', strlen($previousLexeme) - 1));

        return $error;
    }
}