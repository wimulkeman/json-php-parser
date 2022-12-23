<?php

namespace Tests;

use RuntimeException;

trait StreamTrait
{
    /**
     * @return resource
     */
    final protected function createStream(string $text)
    {
        $stream = fopen('php://memory', 'rb+');
        if (false === $stream) {
            throw new RuntimeException('In memory stream could not be created for the test');
        }

        fwrite($stream, $text);
        rewind($stream);

        return $stream;
    }
}
