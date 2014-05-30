<?php


/* PHP error reporting level, if different from default */
error_reporting(0);

/* if the /tinymvc/ dir is not up one directory, uncomment and set here */
//define('TMVC_BASEDIR','../tinymvc/');

/* if the /myapp/ dir is not inside the /tinymvc/ dir, uncomment and set here */
//define('TMVC_MYAPPDIR','/path/to/myapp/');
$t = explode('index.php',$_SERVER['PHP_SELF']);
//print_r($t);
define('TMVC_ROOTURL',$t[0]);
/* define to 0 if you want errors/exceptions handled externally */
define('TMVC_ERROR_HANDLING',1);

/* directory separator alias */
if(!defined('DS'))
  define('DS',DIRECTORY_SEPARATOR);

/* set the base directory */
if(!defined('TMVC_BASEDIR'))
  define('TMVC_BASEDIR',dirname(__FILE__) . DS . '..' . DS . 'totemmvc' . DS);

/* include main tmvc class */
require(TMVC_BASEDIR . 'sysfiles' . DS . 'TinyMVC.php');

/* instantiate */
$tmvc = new tmvc();

/* tally-ho! */
$tmvc->main();

?>
