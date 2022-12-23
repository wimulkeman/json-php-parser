<?php

namespace Wimulkeman\JsonParser\Token\Separator;

use Wimulkeman\JsonParser\Token\SeparatorScannableToken;

abstract class LevelSeparatorToken extends SeparatorScannableToken
{
    abstract public function isOpening(): bool;

    abstract public function isClosing(): bool;

    abstract public static function counterPart(): string;
}