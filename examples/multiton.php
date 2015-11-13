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

<h1>\patterns\Multiton example</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

define ('WADEBUG', false);

class myM extends \patterns\Multiton
{
  function __construct($parameter)
  {
    parent::__construct($parameter);
  }

  function getData()
  {
    return $this->parameter;
  }
}

print "Let's get our first multiton instance:<br />";
print "You can get it with a \$M = new myM(10); but this can make an error, you never know if the instance already exists or not. getInstance is the method to use.<br />";

$M = \patterns\Multiton::getInstance(10, 'myM');
// This is equivalent to
$M = myM::getInstance(10);

print "A result with our multiton ".$M->getData() . "<br />";

print "Let's a second multiton instance:<br />";

$M = \patterns\Multiton::getInstance(15, 'myM');

print "A result with our new multiton ".$M->getData() . "<br />";

print "Let's get back the first multiton instance:<br />";

$M = \patterns\Multiton::getInstance(10, 'myM');

print "A result with our first multiton ".$M->getData() . "<br />";

print "Let's try to duplicate a multiton instance and get an error:<br />";

$M2 = new myM(10);
// this can make an error too:
$M2 = clone $M;

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
