<?php

use PHPUnit\Framework\TestCase;

class demoTest extends TestCase
{
    /**
     * @dataProvider demoProvider
     * @coversNothing
     */
    public function testDemo($value)
    {
        $this->assertTrue(boolval($value));
    }

    public function demoProvider()
    {
        return [
            ['yes'],
            [1],
        ];
    }
}
