<?php
  // have to put this into a php block or the <?xml will be put as a PHP syntax error on extended code escape
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <!-- Generic browser family -->
  <title>DomCore Demos, a WebAbility&reg; Network Project</title>
  <meta http-equiv="PRAGMA" content="NO-CACHE" />
  <meta http-equiv="Expires" content="-1" />

  <meta name="Keywords" content="WAJAF, WebAbility" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="Charset" content="UTF-8" />
  <meta name="Language" content="en" />
  <link rel="stylesheet" href="/skins/css/domcore.css" type="text/css" />

</head>
<body>

<div class="container">

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />
<br />

<h1>Factory example</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

setlocale(LC_ALL, 'es_MX.UTF8');
// We have to set NUMERIC to C on mexican locale, since there is a HUGE bug on the use of , instead or . for numeric coma (we use float numbers later in the code)
setlocale(LC_NUMERIC, 'C');
date_default_timezone_set('America/Mexico_City');

define ('WADEBUG', false);

class Integer
{
  private $i;
  function __construct($data = 0) { $this->i = (int)$data; }
  function get() { return $this->i; }
}

class Real
{
  private $r;
  function __construct($data = 0) { $this->r = (float)$data; }
  function get() { return $this->r; }
}

class Complex
{
  private $cx, $cy;
  function __construct($x = 0, $y = 0) { $this->cx = (float)$x; $this->cy = (float)$y; }
  function get() { return '['.$this->cx.','.$this->cy.']'; }
}

class Point
{
  private $px, $py, $pz;
  function __construct($x = 0, $y = 0, $z = 0) { $this->px = (float)$x; $this->py = (float)$y; $this->pz = (float)$z; }
  function get() { return '['.$this->px.','.$this->py.','.$this->pz.']'; }
}

class myFactory extends Factory
{
  function __construct()
  {
    parent::__construct(array('i' => 'Integer', 'r' => 'Real', 'c' => 'Complex'));
  }
}

print "Our factory build numbers, we have Integer (i), Real (r) and Complex (c) numbers available:<br />";
print "Lets build one of each.<br />";

$F = new myFactory();
$I = $F->newProduct('i', 4.6);
$R = $F->newProduct('r', 8.6);
$C = $F->newProduct('c', 12.6, -4);

print "A result with our integer ".$I->get() . "<br />";
print "A result with our real ".$R->get() . "<br />";
print "A result with our complex ".$C->get() . "<br /><br />";

print "Lets add a 4th product: the space point.<br />";
$F->registerProduct('p', 'Point');
print "Lets build a point.<br />";
$P = $F->newProduct('p', 2, 3, 4);
print "A result with our point ".$P->get() . "<br />";

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
