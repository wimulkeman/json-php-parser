<?php

namespace Wimulkeman\JsonParser;

use Wimulkeman\JsonParser\Interfaces\Token\Scannable;
use Wimulkeman\JsonParser\Lexer\IdentifierLexer;
use Wimulkeman\JsonParser\Lexer\LiteralLexer;
use Wimulkeman\JsonParser\Lexer\OperatorLexer;
use Wimulkeman\JsonParser\Lexer\SeparatorLexer;
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
            new IdentifierLexer(),
            new OperatorLexer(),
            new SeparatorLexer(),
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