<?php

namespace Wimulkeman\JsonParser;

use Wimulkeman\JsonParser\Interfaces\Token\Scannable;
use Wimulkeman\JsonParser\Lexer\AbstractLexer;
use Wimulkeman\JsonParser\Lexer\IdentifierLexer;
use Wimulkeman\JsonParser\Lexer\LiteralLexer;
use Wimulkeman\JsonParser\Lexer\OperatorLexer;
use Wimulkeman\JsonParser\Lexer\SeparatorLexer;
use Wimulkeman\JsonParser\Lexer\WhitespaceLexer;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Traits\StreamResourceTrait;

class Lexer implements Scannable
{
    use StreamResourceTrait;

    /** @var array<int, AbstractLexer> */
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
        $startPosition = $this->getCurrentStreamPosition($stream);

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
