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

<h1>\core\WATrowable, \core\WAError examples</h1>

<?php

// We assure any DomCore library we call will be automatically loaded
include_once '../include/__autoload.lib';
setlocale(LC_ALL, 'es_MX.UTF8', 'es_MX', '');
date_default_timezone_set('America/Mexico_City');

try
{
  // Here we are in the application

  // Connect to the database
  if (1 == 2)
    throw new \core\WAError('Critical error, database error.');

  try
  {
    // DATABASE START TRANSACTION
    // $db->starttransaction();

    // INSERTING INTO THE DATABASE
    // $db->insert($data);

    // insert can throw an EXCEPTION
    if (1 == 1)
      throw new \core\WAException('Error inserting the data: there is a duplicate key.');

    // DATABASE COMMIT
    // $db->commit();
  }
  catch (\core\WAException $e)
  {
    // DATABASE ROLLBACK
    // $db->roolback();

    // PRINT THE EXCEPTION OR DO WHATEVER YOU WANT WITH IT
    print $e;
  }

}
catch (\Throwable $t)
{
  print "There was an severe error in the application:";
  print $t;
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
