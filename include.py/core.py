#!/usr/bin/python
# -*- coding: utf8 -*-

# DomCore version
VERSION = '1.01.10'

WADEBUG = None

# DEBUG levels
# All the functions entry
SYSTEM = 1
# Important debug information
INFO = 2
# All the user debug
USER = 3

# Output redirection of errors
# redirect on HTML (i-e with colors and tags)
HTMLREDIR = 1
# redirect on ASCII (only the text)
ASCIIREDIR = 2
# redirect on FILE (only the text)
FILEREDIR = 3

# Type of OS
# if we are working on a Windows type OS
WINDOWS = 1
# if we are working on a Unix type OS
UNIX = 2
# if we are working on a Mac type OS
MAC = 3

# on which type of OS we are working
ostype = None
# if we are on a text or html API
htmlapi = None
# Debug flag: true = log, false = ignore debug, for ALL application
debug = 0

class WADebug:
  # timing of the class
  creation = None
  # Name of the top class owner
  classname = ''

  # Debug flag: true = log, false = ignore debug, for THIS instance only
  localdebug = 0

  # Type of debug: 1 = print in html page, 2 = print in ascii page (no html format), 3 = print in log file
  redirect = HTMLREDIR; # html page
  # Level to log
  level = USER; # only user level by default
  # Log file if redirect type = 3
  filename = None
  # any filter on content
  filter = None

  # set to 1 once initialized (i.e. static variables calculated)
  init = 0

  def __init__(self):
    global WADEBUG
    if WADEBUG == 1:
      print "WADEBUG A 1"
    pass

def getHTMLAPI():
  global htmlapi
  htmlapi = 0

def getOSType():
  global ostype
  ostype = UNIX

getHTMLAPI()
getOSType()


'''

class WADebug
{


  // Statistics on objects and instances
  private static $numtotalinstances = 0;
  private static $numinstances = array();
  private $uidinstance = 0;



  // Main constructor: set the classname and debug status, based on defined WADEBUG
  public function __construct()
  {
    if (!self::$init)
    {
      if (defined('WADEBUG'))
        self::$debug = WADEBUG;
      self::getHTMLAPI();
      self::getOSType();
      self::$init = true;
    }

    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return;

    $this->creation = microtime();
    $this->classname = get_class($this);
    $this->uidinstance = ++self::$numtotalinstances;
    if (isset(self::$numinstances[get_class($this)]))
      self::$numinstances[get_class($this)]++;
    else
      self::$numinstances[get_class($this)] = 1;
  }

  // =========================================================================
  // basic methods, always available
  public static function getHTMLAPI()
  {
    if (self::$htmlapi === null)
      self::$htmlapi = (PHP_SAPI=='cli'?false:true);
    return self::$htmlapi;
  }

  public static function getOSType()
  {
    if (!self::$ostype)
    {
      self::$ostype = WADebug::UNIX;
      if (strpos(strtolower(PHP_OS), 'win') !== false)
        self::$ostype = WADebug::WINDOWS;
      elseif (strpos(strtolower(PHP_OS), 'mac') !== false)
        self::$ostype = WADebug::MAC;
    }
    return self::$ostype;
  }

  // =========================================================================
  // debug methods, available only if WADEBUG is set
  public static function setDebug($flag)
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return;
    self::$debug = $flag;
  }

  public static function getDebug()
  {
    return self::$debug;
  }

  public function setLocalDebug($flag)
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return;
    $this->localdebug = $flag;
  }

  public function getLocalDebug()
  {
    return $this->localdebug;
  }

  public static function setRedirect($redir, $filename = null)
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return;
    self::$redirect = $redir;
    self::$filename = $filename;
  }

  public static function getRedirect()
  {
    return self::$redirect;
  }

  public static function getRedirectFile()
  {
    return self::$filename;
  }

  public static function setLevel($level)
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return;
    self::$level = $level;
  }

  public static function getLevel()
  {
    return self::$level;
  }

  public static function setFilter($filter)
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return;
    self::$filter = $filter;
  }

  public static function getFilter()
  {
    return self::$filter;
  }

  public function getClassName()
  {
    return $this->classname;
  }

  public function getCreated()
  {
    return $this->created;
  }

  protected function doDebug($message, $level = WADebug::USER)
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return;

    if ((self::$debug || $this->localdebug) && $level >= self::$level)
    {
      if (self::$filter && stripos($message, self::$filter) === false)
        return;
      switch(self::$redirect)
      {
        case WADebug::HTMLREDIR: // html page
          $color = 'black';
          if ($level == WADebug::SYSTEM)
            $color = 'blue';
          if ($level == WADebug::INFO)
            $color = 'green';
          if ($level == WADebug::USER)
            $color = 'red';
          print '<font color="'.$color.'"><b>'.$this->classname.'@'.$this->uidinstance.':</b> '.$message.'</font><br />'.PHP_EOL;
          break;
        case WADebug::ASCIIREDIR: // ascii text page
          print $this->classname.'@'.$this->uidinstance.': '.$message.PHP_EOL;
          break;
        case WADebug::FILEREDIR: // log file
          $f = fopen(self::$filename, 'a');
          fwrite($f, $this->classname.'@'.$this->uidinstance.': '.$message.PHP_EOL);
          fclose($f);
          break;
        default:
          break;
      }
    }
  }

  public static function getNumTotalInstances()
  {
    return self::$numtotalinstances;
  }

  public static function getAllInstances()
  {
    return self::$numinstances;
  }

  public function getNumInstances()
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return 0;
    return self::$numinstances[get_class($this)];
  }

  public function getUIDInstance()
  {
    return $this->uidinstance;
  }

  protected function __getValue($val, $indent = 0, $ignore = array())
  {
    if (is_object($val) && $val instanceOf WADebug)
    {
      return '{<br />'.PHP_EOL.$val->explain($indent+2, $ignore).str_repeat('.', $indent+2).'}';
    }
    if (is_array($val))
    {
      $ret = '{';
      $item = 0;
      foreach($val as $k => $v)
        $ret .= ($item++?', ':'') . $k .' => '.$this->__getValue($v, $indent+2);
      $ret .= '}';
      return $ret;
    }
    // timestamp ?
    if (preg_match('/^0\.[0-9]{8}\s[0-9]{1,12}$/', $val))
    {
      $d = explode(' ', $val);
      return date('Y-m-d H:i:s ', $d[1]) . substr($d[0], 2, 3) . '.' . substr($d[0], 5);
    }
    return var_export($val, true);
  }

  public function explain($indent = 0, $ignore = array())
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return '';

    if (self::$htmlapi)
    {
      // get all the data of this object
      $exp = str_repeat('.', $indent).'<font color="red">Class name: <b>'.$this->classname.'</b> with '.self::$numinstances[$this->classname].' instances<br />'.PHP_EOL;
      $exp .= str_repeat('.', $indent).'Instance #<b>'.$this->uidinstance.'</b> of '.self::$numtotalinstances.' total instances<br />'.PHP_EOL;
      $exp .= str_repeat('.', $indent).'Debug mode is <b>'.(self::$debug?'On':'Off').'</b> and Local Debug is <b>'.($this->localdebug?'On':'Off').'</b></font><br />'.PHP_EOL;
    }
    else
    {
      $exp = str_repeat('.', $indent).'Class name: '.$this->classname.' with '.self::$numinstances[$this->classname].' instances'.PHP_EOL;
      $exp .= str_repeat('.', $indent).'Instance #'.$this->uidinstance.' of '.self::$numtotalinstances.' total instances'.PHP_EOL;
      $exp .= str_repeat('.', $indent).'Debug mode is '.(self::$debug?'On':'Off').' and Local Debug is '.($this->localdebug?'On':'Off').PHP_EOL;
    }

    $class = new ReflectionClass($this->getClassName());
    $properties = $class->getProperties();
    foreach($properties as $prop)
    {
      $name = $prop->getName();
      if (in_array($name, $ignore))
        continue;
      $origin = $prop->getDeclaringClass()->getname();
      if ($origin != $this->getClassName())
        $origin = '&'.$origin;
      $access = false;
      if ($prop->isPublic())
      {
        $exp .= str_repeat('.', $indent).$origin.'+';
        $access = true;
      }
      elseif ($prop->isProtected())
      {
        $exp .= str_repeat('.', $indent).$origin.'#';
        $access = true;
      }
      elseif ($prop->isPrivate())
      {
        $exp .= str_repeat('.', $indent).$origin.'-';
      }
      $exp .= $prop->isStatic() ? '::' : '';
      $exp .= '<b>'.$name.'</b>';

      if ($access)
      {
        if ($prop->isStatic())
          $exp .= ' = '; //. $this->__getValue(self::$$name, $indent, $ignore);
        else
          $exp .= ' = '; // . $this->__getValue($this->$name, $indent, $ignore);
      }
      else
      {
        $fct = 'get'.$name;
        if (method_exists($this,$fct))
          $exp .= ' = ' . $this->$fct();
        else
          $exp .= ' is private';
      }
      $exp .= '<br />'.PHP_EOL;
    }
    return $exp;
  }

  // this function is NEEDED by PHP 5.2 , since __tostring is not automatic for objects since this version
  public function __toString()
  {
    if (!defined('WADEBUG'))   // for production sites, we dont use anymore debug properties
      return '';

    return $this->classname.'@'.$this->uidinstance;
  }
}

?>

'''