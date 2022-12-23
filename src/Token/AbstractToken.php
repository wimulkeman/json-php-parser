<?php

namespace Wimulkeman\JsonParser\Token;

use Wimulkeman\JsonParser\Interfaces\Token\GrammerSupport;
use Wimulkeman\JsonParser\Interfaces\Token\StreamPositionInterface;

abstract class AbstractToken implements StreamPositionInterface, GrammerSupport
{
    protected string $lexeme;
    protected int $pointerStart;
    protected int $pointerEnd;

    final public function getLexeme(): string
    {
        return $this->lexeme;
    }

    final protected function setPointerStart(int $start): void
    {
        $this->pointerStart = $start;
    }

    final public function getPointerStart(): int
    {
        return $this->pointerStart;
    }

    final protected function setPointerEnd(int $end): void
    {
        $this->pointerEnd = $end;
    }

    final public function getPointerEnd(): int
    {
        return $this->pointerEnd;
    }

    final public static function requiresLevel(): bool
    {
        return count(static::supportedLevelTokens()) > 0;
    }

    abstract public static function acceptsAllTokens(): bool;

    abstract public static function supportedNextTokens(): array;

    abstract public static function supportedLevelTokens(): array;
}
