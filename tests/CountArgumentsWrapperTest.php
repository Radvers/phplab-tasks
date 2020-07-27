<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    public function testHandleException()
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper(1, 'text', 'true');
    }
}