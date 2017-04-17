<?php

namespace testunit;

if (PHP_VERSION_ID >= 70000) // travis PHP unit uses >=3.5 on PHP7+
{
  class WADebugTest extends \PHPUnit\Framework\TestCase
  {
    public function testCreate()
    {
      $x = new \core\WADebug();
      var_dump($x);
      $this->assertEquals('OK', 'OK');
    }
  }
}
else
{
  class WADebugTest extends \PHPUnit_Framework_TestCase
  {
    public function testCreate()
    {
      $x = new \core\WADebug();
      var_dump($x);
      $this->assertEquals('OK', 'OK');
    }
  }
}
?>