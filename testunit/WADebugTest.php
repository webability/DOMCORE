<?php

namespace testunit;

class WADebugTest extends \PHPUnit\Framework\TestCase
{
  public function testCreate()
  {
    $x = new \core\WADebug();
    var_dump($x);
    $this->assertEquals('OK', 'OK');
  }

}

?>