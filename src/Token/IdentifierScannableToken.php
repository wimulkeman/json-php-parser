<?php

namespace Wimulkeman\JsonParser\Token;

use Wimulkeman\JsonParser\Exception\ContentNotAString;

class IdentifierScannableToken extends ScannableToken
{
    protected string $lexeme = '';

    private string $wrappingCharacter = '"';
    private string $escapeCharacter = "\\";

    public function scan($stream): ?ScannableToken
    {
        $this->setPointerStart(ftell($stream));

        $lexemeLength = strlen($this->wrappingCharacter);
        $streamStart = $this->scanStream($stream, $lexemeLength);

        if ($this->wrappingCharacter !== $streamStart) {
            return null;
        }

        $escape = false;
        try {
            while ($character = $this->scanStream($stream, 1)) {
                if (false === $escape && $this->wrappingCharacter === $character) {
                    return $this;
                }

                if ($this->escapeCharacter === $character) {
                    if (false === $escape) {
                        $escape = true;

                        continue;
                    }
                }
                $escape = false;

                $this->lexeme .= $character;
            }
        } catch (ContentNotAString $exception) {
            return null;
        }

        return null;
    }
}