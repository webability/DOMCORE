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

<h1>templateSource example</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

define('WADEBUG', false);
setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

echo "We are testing this on:<br />";
echo "DomCore version ".\core\WADebug::VERSION."<br />";
echo "HTML API ? ".(\core\WADebug::getHTMLAPI()?'Yes':'No')."<br />";
echo "OS Type ? ".(\core\WADebug::getOSType()==\core\WADebug::WINDOWS?'Windows':(\core\WADebug::getOSType()==\core\WADebug::UNIX?'Unix':'Mac'))."<br />";
echo "<br />";

$t1 = microtime();

// Start the SHM with 20Mb default size and default ID
$SHM = new \core\WASHM();

// Lets create a LanguageSource based on the french messages
$tempsource = new \datasources\TemplateSource(new \datasources\FileSource('./', '', 'projects.template'),
                                 new \datasources\FastObjectSource(new \datasources\FileSource('./', '', 'projectstemplate.afo'),
                                                      new \datasources\SHMSource('projectstemplate', $SHM)
                                               )
                                 );

$temp = $tempsource->read();

$data = array(
  '{title}' => 'Hotels projects:',
  'data' => array(
    array('{id}' => 1, '{name}' => 'Paris', '{status}' => 1, '{statusname}' => 'In project', '{flag}' => 'fr.gif'),
    array('{id}' => 2, '{name}' => 'London', '{status}' => 1, '{statusname}' => 'In project', '{flag}' => 'uk.gif'),
    array('{id}' => 3, '{name}' => 'Madrid', '{status}' => 2, '{statusname}' => 'In construction'),
    array('{id}' => 4, '{name}' => 'New York', '{status}' => 3, '{statusname}' => 'Finished', '{flag}' => 'us.gif'),
    array('{id}' => 5, '{name}' => 'Los Angeles', '{status}' => 1, '{statusname}' => 'In project', '{flag}' => 'us.gif'),
    array('{id}' => 6, '{name}' => 'Mexico City', '{status}' => 1, '{statusname}' => 'In project', '{flag}' => 'mx.gif'),
    array('{id}' => 7, '{name}' => 'Moscu', '{status}' => 1, '{statusname}' => 'In project'),
    array('{id}' => 8, '{name}' => 'Roma', '{status}' => 1, '{statusname}' => 'In project'),
    array('{id}' => 9, '{name}' => 'Berlin', '{status}' => 3, '{statusname}' => 'Finished'),
  )

);

$temp->metaElements($data, false, false);

print $temp->resolve();

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
