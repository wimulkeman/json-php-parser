<?php

namespace Wimulkeman\JsonParser\Token;

use Wimulkeman\JsonParser\Exception\ContentNotAString;
use Wimulkeman\JsonParser\Exception\InvalidStreamProvided;
use Wimulkeman\JsonParser\Exception\MissingDynamicScanImplementation;
use Wimulkeman\JsonParser\Interfaces\Token\Scannable;

class ScannableToken extends AbstractToken implements Scannable
{
    protected string $lexeme;
    protected bool $dynamicScan = false;

    /**
     * @param resource $stream
     *
     * @return ScannableToken|null
     */
    public function scan($stream): ?ScannableToken
    {
        if (true === $this->dynamicScan) {
            throw new MissingDynamicScanImplementation();
        }

        $this->setPointerStart(ftell($stream));

        $lexemeLength = strlen($this->lexeme) ?: 1 ;
        $streamContent = $this->scanStream($stream, $lexemeLength);

        if ($this->lexeme !== $streamContent) {
            return null;
        }

        $this->setPointerEnd(ftell($stream));

        return $this;
    }

    protected function scanStream($stream, $length): string
    {
        if (!is_resource($stream) || 'stream' !== get_resource_type($stream)) {
            throw new InvalidStreamProvided();
        }

        $content = fread($stream, $length);

        if (!is_string($content)) {
            throw new ContentNotAString();
        }

        return $content;
    }
}