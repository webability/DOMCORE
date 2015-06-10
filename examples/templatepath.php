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

<h1>WATemplate path example</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

$template = <<<EOF
%-- This is the example of a template --%
Let's build a table.<br />
<br />

The table with an alternate template and special lines templates:<br />
<b>{{title}}</b><br />
<table style="width: 300px; border: 1px solid #333;">
@@data:template3:status@@
</table>
<br /><br />

Lets extract some specific data with a specific path:<br />
<br />
??data>6:oneproject??
<br />
Or directly the elements:<br />
ID: <b>{{data>5>id}}</b><br />
Name: <b>{{data>5>name}}</b><br />
Status:<b>{{data>5>statusname}}</b></br>

[[template3.key.6]]
  <tr style="background-color: #fc0;"><td style="border-bottom: 1px dotted #666;">{{id}}</td><td style="border-bottom: 1px dotted #666;">{{name}}</td><td style="border-bottom: 1px dotted #666;">{{statusname}}</td></tr>
[[]]

[[template3.sel.3]]
  <tr style="background-color: #cfc;"><td style="border-bottom: 1px dotted #666;">{{id}}</td><td style="border-bottom: 1px dotted #666;">{{name}}</td><td style="border-bottom: 1px dotted #666; font-weight: bold; color: green;">{{statusname}}</td></tr>
[[]]

[[template3.loop]]
  <tr style="background-color: #bbf;"><td style="border-bottom: 1px dotted #666;">{{id}}</td><td style="border-bottom: 1px dotted #666;">{{name}}</td><td style="border-bottom: 1px dotted #666;">{{statusname}}</td></tr>
[[]]

[[template3.loopalt]]
  <tr style="background-color: #ccf;"><td style="border-bottom: 1px dotted #666;">{{id}}</td><td style="border-bottom: 1px dotted #666;">{{name}}</td><td style="border-bottom: 1px dotted #666;">{{statusname}}</td></tr>
[[]]

[[oneproject]]
ID: <b>{{id}}</b><br />
Name: <b>{{name}}</b><br />
Status:<b>{{statusname}}</b></br>
[[]]

EOF;

$data = array(
  'title' => 'Hotels projects:',
  'data' => array(
    1 => array('id' => 1, 'name' => 'Paris', 'status' => 1, 'statusname' => 'In project'),
    2 => array('id' => 2, 'name' => 'London', 'status' => 1, 'statusname' => 'In project'),
    3 => array('id' => 3, 'name' => 'Madrid', 'status' => 2, 'statusname' => 'In construction'),
    4 => array('id' => 4, 'name' => 'New York', 'status' => 3, 'statusname' => 'Finished'),
    5 => array('id' => 5, 'name' => 'Los Angeles', 'status' => 1, 'statusname' => 'In project'),
    6 => array('id' => 6, 'name' => 'Mexico City', 'status' => 1, 'statusname' => 'In project'),
    7 => array('id' => 7, 'name' => 'Moscu', 'status' => 1, 'statusname' => 'In project'),
    8 => array('id' => 8, 'name' => 'Roma', 'status' => 1, 'statusname' => 'In project'),
    9 => array('id' => 9, 'name' => 'Berlin', 'status' => 3, 'statusname' => 'Finished'),
  )
);

$temp = new WATemplate($template);

$temp->metaElements($data, false, true);

print $temp;

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
