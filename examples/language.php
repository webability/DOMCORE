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

<h1>WALanguage example</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';

setlocale(LC_ALL, 'es_MX.UTF8');
date_default_timezone_set('America/Mexico_City');

define ('WADEBUG', false);

$table = <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<language id="daysofweek" lang="es">

<entry id="sunday"><![CDATA[Domingo]]></entry>
<entry id="monday"><![CDATA[Lunes]]></entry>
<entry id="tuesday"><![CDATA[Martes]]></entry>
<entry id="wednesday"><![CDATA[Miércoles]]></entry>
<entry id="thursday"><![CDATA[Jueves]]></entry>
<entry id="friday"><![CDATA[Viernes]]></entry>
<entry id="saturday"><![CDATA[Sábado]]></entry>

</language>
EOF;

$entries = WALanguage::Compile($table);

// print day in spanish/mexico
print "Hoy es ".$entries[strtolower(date("l", time()))] . "<br />";

?>

<br />
<br />
<br />
<br />

<a href="../index.html" class="back">&#xAB; Back to the index</a><br />

</div>

</body>
</html>
