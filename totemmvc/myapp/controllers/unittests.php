<?php

/**
 * default.php
 *
 * default application controller
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */

class Unittests_Controller extends TinyMVC_Controller
{
	function index()
	{
	//create a copy of the class
		$tmvc = tmvc::instance();
		$this->load->library('uri');
		$slug= $this->uri->segment(4);
		$template = $this->compile('unittests/index_view');
		echo $template;		
	}
		

}

?>
