<?php

namespace Wimulkeman\JsonParser;

use LogicException;
use Wimulkeman\JsonParser\Exception\JsonParserException;
use Wimulkeman\JsonParser\Exception\Parser\InvalidGrammerSequence;
use Wimulkeman\JsonParser\Exception\Parser\MissingLevelOpener;
use Wimulkeman\JsonParser\Interfaces\Token\GrammerSupport;
use Wimulkeman\JsonParser\Token\AbstractToken;
use Wimulkeman\JsonParser\Token\Separator\LevelSeparatorToken;
use Wimulkeman\JsonParser\Token\Whitespace\StartOfStreamWhitespaceToken;
use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class Parser
{
    private Scanner $scanner;
    /** @var array<int, LevelSeparatorToken> */
    private array $levels = [];

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

            if ($currentToken instanceof LevelSeparatorToken) {
                $this->handleLevelToken($currentToken, $previousToken);
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

    private function handleLevelToken(LevelSeparatorToken $currentToken, AbstractToken $previousToken): void
    {
        if ($currentToken->isOpening()) {
            $this->levels[] = $currentToken;

            return;
        }

        if (false === $currentToken->isClosing()) {
            throw new LogicException(
                sprintf(
                    'The token "%s" should be either a opering or closing token for the level',
                    get_class($currentToken)
                )
            );
        }

        $activeLevel = array_pop($this->levels);
        if (null === $activeLevel) {
            throw new MissingLevelOpener($currentToken, $previousToken);
        }

        if ($currentToken::counterPart() !== get_class($activeLevel)) {
            throw new MissingLevelOpener($currentToken, $previousToken);
        }
    }
}