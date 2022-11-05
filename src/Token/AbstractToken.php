<?php

namespace Wimulkeman\JsonParser\Token;

abstract class AbstractToken
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
}