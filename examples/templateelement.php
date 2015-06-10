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

  <meta name="Keywords" content="DomCore, templates, WebAbility" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="Charset" content="UTF-8" />
  <meta name="Language" content="en" />
  <link rel="stylesheet" href="/skins/css/domcore.css" type="text/css" />

</head>
<body>

<div class="container">

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />
<br />

<h1>WATemplate elements example</h1>

<h2>Relax mode</h2>
<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

// RELAX MODE

$template = <<<EOF
%-- This is the example of a template --%
<h3>##maintitle##</h3>
Let's print some results.<br />
In the <b>normal mode</b>, the recommended syntax of parameters, languages and fields, to identify them rapidly by nature in your templates:<br />
<b>__PARAM__</b> are simple parameters used to build the template,<br />
<b>##entry##</b> are language entries (titles, helps, etc),<br />
<b>{field}</b> are information fields, and generaly come from a database record.<br />
This syntax is OPTIONAL, however <b>HIGHLY RECOMMENDED</b>.<br />
Note the normal elements (added with ->addElement() ) are NOT metaelements,  and you must not use { { and } } for them.<br />
<br />
<div style="width: __WIDTH__; height: __HEIGHT__; background-color: __COLOR__; color: white; padding: 10px;">

##title1##: {value1}<br />
##title2##: {value2}<br />
##title3##: {value3}<br />

</div>
<br />

EOF;

$temp = new WATemplate($template);

// the use of addElement, addElements or metaelements for SIMPLE ELEMENTS is exactly the same result, use the one that you prefer based on your needs
// Only the way to pass through the parameters change.

// all the elements are CUMULATIVE
$temp->addElement('##maintitle##', ' elements');
$temp->addElement('##maintitle##', ' example');

// You can also insert elements in REVERSE mode, i.e. at the beginning of others added elements of same ID
$temp->addElement('##maintitle##', 'Simple', true);

// Some simple parameters in arrays
$temp->addElement(
  array('__WIDTH__', '__HEIGHT__', '__COLOR__'),
  array('200px', '100px', '#800')
);

// metaelements can be called ONLY ONCE
$temp->metaElements(
  array(
    '##title1##' => 'City',
    '##title2##' => 'Engineer',
    '##title3##' => 'Advance',
    '{value1}' => 'Mexico',
    '{value2}' => 'Pedro Perez',
    '{value3}' => '80%',
  ),
  false,
  false
);

print $temp->resolve();




// STRICT MODE

print "<h2>Strict mode</h2>";

$template = <<<EOF
%-- This is the example of a template --%
<h3>##maintitle##</h3>
Let's print some results.<br />
In the <b>strict mode</b>, you may use <b>any type of name syntax</b> without worrying about the names conflict, since they are all included into { { and } }.<br />
<br />
<b>It is highly recommended to ALWAYS use the strict mode</b>.<br />
Note the normal elements (added with ->addElement() ) are NOT metaelements,  and you must not use { { and } } for them.<br />
<br />
<div style="width: __WIDTH__; height: __HEIGHT__; background-color: __COLOR__; color: white; padding: 10px;">

{{title1}}: {{value1}}<br />
{{title2}}: {{value2}}<br />
{{title3}}: {{value3}}<br />

</div>
<br />

EOF;

$temp = new WATemplate($template);

// the use of addElement, addElements or metaelements for SIMPLE ELEMENTS is exactly the same result, use the one that you prefer based on your needs
// Only the way to pass through the parameters change.

// Simple elements are NOT meta elements, Do not use {{...}} since they are a metaelement

// all the elements are CUMULATIVE
$temp->addElement('##maintitle##', ' elements');
$temp->addElement('##maintitle##', ' example');

// You can also insert elements in REVERSE mode, i.e. at the beginning of others added elements of same ID
$temp->addElement('##maintitle##', 'Simple', true);

// Some simple parameters in arrays
$temp->addElement(
  array('__WIDTH__', '__HEIGHT__', '__COLOR__'),
  array('300px', '150px', '#008')
);

// you do not need to add {{ and }} to the elements and metaelements in strict mode. addElements() is a deprecated synonym of metaElements()

// metaelements can be called ONLY ONCE
$temp->metaElements(
  array(
    'title1' => 'City',
    'title2' => 'Engineer',
    'title3' => 'Advance',
    'value1' => 'Mexico',
    'value2' => 'Pedro Perez',
    'value3' => '80%',
  ),
  false,
  true
);

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
