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
  	//get the base url
  	$bu =  $this->baseurl();
	//assign the base url so we can use it.
	$this->view->assign('baseurl',$bu);
	//load the template
    $this->view->display('layout/header');
    $this->view->display('home/home_view');
    $this->view->display('layout/footer');	
	
  }
  
}

?>
