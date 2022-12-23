<?php

namespace Wimulkeman\JsonParser\Token;

use LogicException;
use Wimulkeman\JsonParser\Exception\ContentNotAString;
use Wimulkeman\JsonParser\Exception\InvalidStreamProvided;
use Wimulkeman\JsonParser\Interfaces\Token\Scannable;
use Wimulkeman\JsonParser\Traits\StreamResourceTrait;

abstract class ScannableToken extends AbstractToken implements Scannable
{
    use StreamResourceTrait;

    /**
     * @param resource $stream
     *
     * @return ScannableToken|null
     */
    public function scan($stream): ?ScannableToken
    {
        $this->setPointerStart($this->getCurrentStreamPosition($stream));

        $lexemeLength = strlen($this->lexeme) ?: 1;
        $streamContent = $this->scanStream($stream, $lexemeLength);

        if ($this->lexeme !== $streamContent) {
            return null;
        }

        $this->setPointerEnd($this->getCurrentStreamPosition($stream));

        return $this;
    }

    public static function acceptsAllTokens(): bool
    {
        return false;
    }

    /**
     * @param resource $stream
     */
    protected function scanStream($stream, int $length): string
    {
        if (!is_resource($stream) || 'stream' !== get_resource_type($stream)) {
            throw new InvalidStreamProvided();
        }

        if ($length < 0) {
            throw new LogicException('The length to scan can only be positive');
        }

        $content = fread($stream, $length);

        if (!is_string($content)) {
            throw new ContentNotAString();
        }

        return $content;
    }
}
