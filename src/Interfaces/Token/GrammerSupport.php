<?php

namespace Wimulkeman\JsonParser\Interfaces\Token;

interface GrammerSupport
{
    /**
     * @return array<int, string>
     */
    public function supportedNextTokens(): array;

    /**
     * @return array<int, string>
     */
    public function supportedLevelTokens(): array;

    public function requiresLevel(): bool;

    public function acceptsAllTokens(): bool;
}