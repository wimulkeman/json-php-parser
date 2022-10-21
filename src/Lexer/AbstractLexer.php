<?php

namespace Wimulkeman\JsonParser\Lexer;

use Wimulkeman\JsonParser\Interfaces\Token\Scannable;
use Wimulkeman\JsonParser\Token\ScannableToken;

abstract class AbstractLexer implements Scannable
{
    /**
     * @return array<ScannableToken>
     */
    abstract protected function getLexers(): array;

    final public function scan($stream): ?ScannableToken
    {
        $startPosition = ftell($stream);

        foreach ($this->getLexers() as $lexer) {
            $token = $lexer->scan($stream);
            if (null === $token) {
                fseek($stream, $startPosition);

                continue;
            }

            return $token;
        }

        fseek($stream, $startPosition);

        return null;
    }
}