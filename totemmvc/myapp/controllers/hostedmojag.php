<?php

/**
 * default.php
 *
 * default application controller
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */

class hostedmojag_Controller extends TinyMVC_Controller
{
  function index()
  {



	//load the template
	$template = $this->compile('hostedmojag/index_view','','layout/mojaghostedfooter');
	echo $template;
	
  }
  
}

?>
