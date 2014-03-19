<?php

/***
 * Name:       TinyMVC
 * About:      An MVC application framework for PHP
 * Copyright:  (C) 2007-2008 Monte Ohrt, All rights reserved.
 * Author:     Monte Ohrt, monte [at] ohrt [dot] com
 * License:    LGPL, see included license file  
 ***/

// ------------------------------------------------------------------------

/**
 * TinyMVC_Controller
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */

class TinyMVC_Controller
{

 	/**
	 * class constructor
	 *
	 * @access	public
	 */
  function __construct()
  {
    /* save controller instance */
    tmvc::instance($this,'controller');
  
    /* instantiate load library */
    $this->load = new TinyMVC_Load;  

    /* instantiate view library */
    $this->view = new TinyMVC_View;
  }
  
	/**
	 * index
	 *
	 * the default controller method
	 *
	 * @access	public
	 */    
  function index() { }

	/**
	 * __call
	 *
	 * gets called when an unspecified method is used
	 *
	 * @access	public
	 */    
  function __call($function, $args) {
  

    throw new Exception("Unknown controller method '{$function}'");

  }
  
   public function resourceurl()
  {
  	return('http://'.$_SERVER['HTTP_HOST'].TMVC_ROOTURL);
  }
  
  
     public function baseurl()
  {
  	return('http://'.$_SERVER['HTTP_HOST'].'/');
  }
  
  public function memoryused()
  {
  	return(memory_get_usage());
  }
  
  public function addModal()
  {
  	
  }
  
  public function addJs()
  {
  	
  }
  
  public function addCss()
  {
  	
  }
  
  public function compile($template,$headeroverride='',$footeroverride='')
  {
  	//check for header or footer overide.  this is useful as every now and again you do not want to use the defaults.
  	if ($headeroverride != '')
		$header = $headeroverride;
	else {
		$header = 'layout/header';
	}
  	if ($footeroverride != '')
		$footer = $footeroverride;
	else {
		$footer = 'layout/footer';
	}
	
  	//get the base url for use in your views.
	$bu =  $this->baseurl();
	//get the resource url for use in your views.
	$ru =  $this->resourceurl(); 	
	//echo "$ru";
	//exit;
	//get the memory used
	$mu =  $this->memoryused(); 
	//assign them to the view controller.
	$this->view->assign('baseurl',$bu);
	$this->view->assign('resourceurl',$ru);
	$this->view->assign('memoryused',$mu);

	//load the header
	$output = $this->view->fetch($header);
	//menu
	$output = $output. $this->view->fetch('layout/menu');
	//load the content templates
	$output = $output.$this->view->fetch($template);
	//load the footer
	$output = $output.$this->view->fetch($footer);
	//do any post processing here.


	
	//return the compiled template.
	return($output);

  }
  
  
}

?>
