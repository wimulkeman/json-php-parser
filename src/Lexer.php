<?php

namespace Wimulkeman\JsonParser;

use Wimulkeman\JsonParser\Interfaces\Token\Scannable;
use Wimulkeman\JsonParser\Lexer\LiteralLexer;
use Wimulkeman\JsonParser\Lexer\WhitespaceLexer;
use Wimulkeman\JsonParser\Token\ScannableToken;

class Lexer implements Scannable
{
    private array $lexers;

    public function __construct()
    {
        $this->lexers = [
            new LiteralLexer(),
            new WhitespaceLexer(),
        ];
    }

    final public function scan($stream): ?ScannableToken
    {
        $startPosition = ftell($stream);

        foreach ($this->lexers as $lexer) {
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