<?php

/**
 * default.php
 *
 * default application controller
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */

class Home_Controller extends TinyMVC_Controller
{
  function index()
  {



	//load the template
	$template = $this->compile('home/home_view');
	echo $template;
	
  }
  
}

?>
