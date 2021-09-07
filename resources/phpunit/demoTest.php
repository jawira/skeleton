<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class demoTest extends TestCase
{
  /**
   * @dataProvider demoProvider
   * @covers       \App\Entity\Demo::myMethod
   * @testdox      The value $value is true
   */
  function testDemo($value)
  {
    $this->assertTrue(boolval($value));
  }

  function demoProvider()
  {
    return [['yes'],
            [1],];
  }
}
