<?php

namespace Wimulkeman\JsonParser\Traits;

trait StreamResourceTrait
{
    /**
     * @param resource $stream
     */
    public function getCurrentStreamPosition($stream): int
    {
        $currentPosition = ftell($stream);
        if (false === $currentPosition) {
            throw new \RuntimeException('The current position could not be determined from the provided resource stream');
        }

        return $currentPosition;
    }
}
