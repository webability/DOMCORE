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

  <meta name="Keywords" content="DOMCORE, WebAbility" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="Charset" content="UTF-8" />
  <meta name="Language" content="en" />
  <link rel="stylesheet" href="/skins/css/domcore.css" type="text/css" />

</head>
<body>

<div class="container">

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />
<br />

<h1>Base Object example</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

define ('WADEBUG', false);

class MyBase extends WABase
{
  public $database;
  private $config;
  
  function __construct($config)
  {
    parent::__construct();
    
    // we connect a database
    $this->database = 'Connector to database 1';
    // we keep the config
    $this->config = $config;
  }
  
  function getConfig()
  {
    return $this->config;
  }
}

print "We create the base object:<br />";
$base = new MyBase(array('config' => 'something' ));
print "The base object is automatically assigned to the WAObject static global attibute.<br />";

class myM extends WAObject
{
  function __construct()
  {
    parent::__construct();
  }
  
  function getDatabase()
  {
    return $this->base->database;
  }

  function getConfig()
  {
    return $this->base->getConfig();
  }
}

print "Let's build any object for our application:<br />";
$M = new myM();

print "Let's use the database:<br />";
print $M->getDatabase();

print "Let's use the configuration:<br />";
print $M->getConfig();

class myM2 extends WAObject
{
  function __construct()
  {
    parent::__construct();
  }
  
  function changeDatabase()
  {
    $this->base->database = 'new database 2';
  }
}

print "Let's build another object to commute the database:<br />";
$M2 = new myM2();
$M2->changeDatabase;

print "Let's check the database through the first object:<br />";
print $M->getDatabase();

print "The base object is generally used to set and get the whole system configuration, database connectors, user conectivity and security, and very global I/O methods for the whole system.<br />";

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
