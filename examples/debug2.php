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

<h1>WADebug example</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

define('WADEBUG', false);
setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

echo "We are testing this on:<br />";
echo "DomCore version ".WADebug::VERSION."<br />";
echo "HTML API ? ".(WADebug::getHTMLAPI()?'Yes':'No')."<br />";
echo "OS Type ? ".(WADebug::getOSType()==WADebug::WINDOWS?'Windows':(WADebug::getOSType()==WADebug::UNIX?'Unix':'Mac'))."<br />";
echo "<br />";

// We fix the output on screen in HTML
WADebug::setRedirect(WADebug::HTMLREDIR, null);

// We fix the output to SYSTEM level (all the messages)
WADebug::setLevel(WADebug::SYSTEM);

// We start debug mode
WADebug::setDebug(true);

class A extends WADebug
{
  public $a = 1;

  function __construct()
  {
    // ALWAYS CALL THE CONSTRUCTOR OF THE FATHER
    parent::__construct();

    // WE RECOMMEND ALWAYS FILTER THE CALL TO DODEBUG (MUCH FASTER)
    if (self::$debug || $this->localdebug)
      $this->doDebug("Constructor of A class", WADebug::SYSTEM);
  }

  public function setA($newvalue)
  {
    if (self::$debug || $this->localdebug)
      $this->doDebug("We set new value to A->a : %.", WADebug::INFO, $newvalue);

    $this->a = $newvalue;
  }
}

class B extends A
{
  public $b = 5;

  function __construct()
  {
    parent::__construct();

    if (self::$debug || $this->localdebug)
      $this->doDebug("Constructor of B class", WADebug::SYSTEM);
  }

  public function setB($newvalue)
  {
    if (self::$debug || $this->localdebug)
      $this->doDebug("We set new value to B->b: %.", WADebug::INFO, $newvalue);

    $this->b = $newvalue;
  }
}

// We create new instances
$instance1 = new A();
$instance2 = new A();
$instance3 = new B();

// We assign new values
$instance1->setA(10);
$instance2->setA(20);
$instance3->setA(30);
$instance3->setB(40);

// We show the instances data
print $instance1->explain();
print $instance2->explain();
print $instance3->explain();

// We show A and B data
print $instance1->getNumInstances() . "<br />";
print $instance1->getUIDInstance() . "<br />";
print $instance3->getNumInstances() . "<br />";
print $instance3->getUIDInstance() . "<br />";

// We show global debug data
print WADebug::getNumTotalInstances() . "<br />";

// We terminate debug session
WADebug::setDebug(false);

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
