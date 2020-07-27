<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    public function testPositive()
    {
        $this->assertEquals(
            [
                'argument_count'  => 1,
                'argument_values' => [2]
            ],
            countArguments(2));
        $this->assertEquals(
            [
                'argument_count'  => 2,
                'argument_values' => [2, 'text']
            ],
            countArguments(2, 'text'));
        $this->assertEquals(
            [
                'argument_count'  => 3,
                'argument_values' => [2, 'text', true]
            ],
            countArguments(2, 'text', true));
    }
}