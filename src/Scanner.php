<?php

namespace Wimulkeman\JsonParser;

use Generator;
use LogicException;
use Wimulkeman\JsonParser\Exception\UntokenizableString;
use Wimulkeman\JsonParser\Token\ScannableToken;
use Wimulkeman\JsonParser\Token\WhitespaceScannableToken;

class Scanner
{
    public const STRIP_WHITESPACES = 'strip_whitespaces';

    private Lexer $lexer;
    private $options = [
        self::STRIP_WHITESPACES => true,
    ];

    public function __construct(array $options = [])
    {
        $this->options = array_merge(
            $this->options,
            $options
        );

        $this->lexer = new Lexer();
    }

    public function setOption($key, $value): void
    {
        if (!isset($this->options[$key])) {
            throw new LogicException('Unsupported option key');
        }

        if (gettype($value) !== gettype($this->options[$key])) {
            throw new LogicException('Unsupported value for the option key');
        }

        $this->options[$key] = $value;
    }

    /**
     * @param resource $stream
     *
     * @return Generator<ScannableToken>
     */
    public function scan($stream): Generator
    {
        while (false === feof($stream)) {
            $token = $this->lexer->scan($stream);
            if (null === $token) {
                throw new UntokenizableString();
            }

            if ($this->options[self::STRIP_WHITESPACES] && $token instanceof WhitespaceScannableToken) {
                continue;
            }

            yield $token;
        }
    }
}
