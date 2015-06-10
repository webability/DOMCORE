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

<h1>WAClass example</h1>

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

class vehicle1 extends WAClass
{
  protected $speed;

  public function __construct($speed)
  {
    parent::__construct();
    $this->speed = $speed;
  }

  protected function serial(&$data)
  {
    $data['speed'] = $this->speed;
  }

  protected function unserial($data)
  {
    $this->speed = $data['speed'];
  }

}

class vehicle2 extends WAClass
{
  protected $speed;
  public $speed1 = 80;
  private $speed2 = 250;

  public function __construct($speed)
  {
    parent::__construct();
    $this->speed = $speed;
  }

  protected function serial(&$data)
  {
    $data['speed'] = $this->speed;
    $data['speed1'] = $this->speed1;
    $data['speed2'] = $this->speed2;
  }

  protected function unserial($data)
  {
    $this->speed = $data['speed'];
    $this->speed1 = $data['speed1'];
    $this->speed2 = $data['speed2'];
  }
}

$car1 = new vehicle1(100);

print "CAR 1 DATA, SERIALIZATION AND COPY OF CAR 1:";
print "<hr />";
print $car1->explain();
print "<hr />";
$ser1 = serialize($car1);
print $ser1;
print "<hr />";
$newcar1 = unserialize($ser1);
print $newcar1->explain();
print "<hr />";

$car2 = new vehicle2(200);

print "CAR 2 DATA, SERIALIZATION AND COPY OF CAR 2:";
print "<hr />";
print $car2->explain();
print "<hr />";
$ser2 = serialize($car2);
print $ser2;
print "<hr />";
$newcar2 = unserialize($ser2);
print $newcar2->explain();

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
