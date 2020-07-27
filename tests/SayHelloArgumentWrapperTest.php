<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    public function testHandleException()
    {
        $this->expectException(InvalidArgumentException::class);
        sayHelloArgumentWrapper(0.5);
    }
}