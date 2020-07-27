<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($argument, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($argument));
    }

    public function positiveDataProvider()
    {
        return [
            [1, 'Hello 1'],
            [false, 'Hello '],
            [true, 'Hello 1'],
            ['Vasia', 'Hello Vasia'],
        ];
    }
}