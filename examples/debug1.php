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

define('WADEBUG', true);
setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

echo "We are testing this on:<br />";
echo "DomCore version ".WADebug::VERSION."<br />";
echo "HTML API ? ".(WADebug::getHTMLAPI()?'Yes':'No')."<br />";
echo "OS Type ? ".(WADebug::getOSType()==WADebug::WINDOWS?'Windows':(WADebug::getOSType()==WADebug::UNIX?'Unix':'Mac'))."<br />";
echo "<br />";

class vehicle extends WADebug
{
  protected $speed;

  public function __construct($speed)
  {
    parent::__construct();
    $this->speed = $speed;
  }
}

class car extends vehicle
{
  public $color;
  private $brand;

  public function __construct($brand, $color)
  {
    parent::__construct(200);
    $this->brand = $brand;
    $this->color = $color;
  }

  public function setColor($color)
  {
    // We could call directly the doDebug method, but making the test here, it's extremely faster for the interpreter
    if (self::$debug || $this->localdebug)
      $this->doDebug("Method call: car->setColor( % )", WADebug::USER, $color);

    $this->color = $color;
  }

  public function getColor()
  {
    // We could call directly the doDebug method, but making the test here, it's extremely faster for the interpreter
    if (self::$debug || $this->localdebug)
      $this->doDebug("Method call: car->getColor()", WADebug::USER);

    return $this->color;
  }
}

$mycar = new car('Ford Fiesta', 'red');

// We show all the properties of mycar
// check that the total quantity of instances is 1 since we only created one up to now
echo "Show the instance mycar:<br />";
echo $mycar->explain();
echo "<br />";

class plane extends vehicle
{
  public $number_of_motors;
  protected $color;

  public function __construct($number_of_motors)
  {
    parent::__construct(1500);
    $this->number_of_motors = $number_of_motors;
  }

  public function setColor($color)
  {
    // We could call directly the doDebug method, but making the test here, it's extremely faster for the interpreter
    if (self::$debug || $this->localdebug)
      $this->doDebug("Method call: plane->setColor( % )", WADebug::USER, $color);

    $this->color = $color;
  }

  public function getColor()
  {
    // We could call directly the doDebug method, but making the test here, it's extremely faster for the interpreter
    if (self::$debug || $this->localdebug)
      $this->doDebug("Method call: plane->getColor()", WADebug::USER);

    return $this->color;
  }
}

$myplane = new plane(4);

// We show all the properties of myplane
// check that the total quantity of instances is now 2 since we only created another one up to now
echo "Show the instance mycar again:<br />";
echo $mycar->explain();
echo "<br />";

echo "Show the instance myplane:<br />";
echo $myplane->explain();
echo "<br />";

echo "Let's paint our properties in blue:<br />";
$mycar->setColor('blue');
$myplane->setColor('blue');
echo "My car is ".$mycar->getColor()."<br />";
echo "My plane is ".$myplane->getColor()."<br />";
echo "<br />";

// We switch to local debug mode
echo "Let's switch car local debug On:<br /><br />";
$mycar->setLocalDebug(true);

echo "Let's paint our properties in green:<br />";
$mycar->setColor('green');
$myplane->setColor('green');
echo "My car is ".$mycar->getColor()."<br />";
echo "My plane is ".$myplane->getColor()."<br />";
echo "<br />";

// We switch to full debug
echo "Let's switch global debug On:<br /><br />";
WADebug::setDebug(true);

echo "Let's paint our properties again:<br />";
$mycar->setColor('orange');
$myplane->setColor('black');
echo "My car is ".$mycar->getColor()."<br />";
echo "My plane is ".$myplane->getColor()."<br />";
echo "<br />";

echo "Show the instance mycar again:<br />";
echo $mycar->explain();
echo "<br />";

echo "Show the instance myplane again:<br />";
echo $myplane->explain();
echo "<br />";

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
