<?php

namespace Wimulkeman\JsonParser\Interfaces\Token;

interface GrammerSupport
{
    /**
     * @return array<int, string>
     */
    public static function supportedNextTokens(): array;

    /**
     * @return array<int, string>
     */
    public static function supportedLevelTokens(): array;

    public static function requiresLevel(): bool;

    public static function acceptsAllTokens(): bool;
}
