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

<h1>WAMessage example</h1>

Let's build a basic error messaging system in in spanish.<br />
Then let's call a database connector, and throw an error in spanish if there is an error (simulated):<br />
<br />

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

define ('WADEBUG', false);
setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

$mymessages = array(
  'database' => 'Error, the database could not be loaded',
  'config' => 'Error, the configuration file could not be loaded'
);

WAMessage::addMessages($mymessages);
// We set core default spanish messages (optional)
WAMessage::setMessagesFile('../messages/messages.es.xml');
// we set our spanish messages ('database' and 'config' entries)
WAMessage::setMessagesFile('./message.es.xml');

// loading the framework
// ...

// We load the framework configuration
$configfile = './config.php';
if (!file_exists($configfile))
{
  print WAMessage::getMessage('config');
}
else
{
  // load the config file

  // We connect to the DB
  if (!mysql_connect('localhost', $config['username'], $config['password']))
  {
    throw new WAError(WAMessage::getMessage('database'));
  }
  else
  {
    // call the framework
    // ...
  }
}

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
