<?php

namespace Wimulkeman\JsonParser\Interfaces\Token;

interface StreamPositionInterface
{
    public function getPointerStart(): int;

    public function getPointerEnd(): int;
}
