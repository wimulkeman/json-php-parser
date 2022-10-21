<?php

namespace Wimulkeman\JsonParser\Token;

abstract class AbstractToken
{
    /** @var mixed */
    protected $value;
    protected int $pointerStart;
    protected int $pointerEnd;

    /**
     * @return mixed
     */
    final public function getTokenValue()
    {
        return $this->value;
    }

    final protected function setPointerStart(int $start): void
    {
        $this->pointerStart = $start;
    }

    final protected function getPointerStart(): int
    {
        return $this->pointerStart;
    }

    final protected function setPointerEnd(int $end): void
    {
        $this->pointerEnd = $end;
    }

    final protected function getPointerEnd(): int
    {
        return $this->pointerEnd;
    }
}