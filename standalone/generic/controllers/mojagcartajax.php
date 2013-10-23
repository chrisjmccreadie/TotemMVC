<?php

/**
 * default.php
 *
 * default application controller
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */

//class Lunch_Controller extends TinyMVC_Controller
 
class Mojagcartajax
{
	
   function __construct()
   {
		session_start();
   }
   
   function index()
   {
   	
   }
   
   function payBasket()
   {
   	if (isset($_SESSION['items']))
	{
	   	$items = $_SESSION['items'];
		$total = 0;
		$i=0;
	
		foreach($items as $item)
		{
			$total = $total+$item['price'];
			$i++;
		}
		//echo $total;
		$fin['basket'] = array('total'=>$total,'numberofitems'=>$i);
	
	}
	else
	{
		$fin = '';
	}		
	echo json_encode($fin);   			
   	
   }
   
   function getBasket()
   {
   	if (isset($_SESSION['items']))
	{
	   	$items = $_SESSION['items'];
		$total = 0;
		$i=0;
	
		foreach($items as $item)
		{
			$total = $total+$item['price'];
			$i++;
		}
		//echo $total;
		$fin['basket'] = array('total'=>$total,'numberofitems'=>$i);
		$fin['basketitems'] = $items;
	
	}
	else
	{
		$fin = '';
	}		
	echo json_encode($fin);   			

   }
   
  function addBasket()
  {
    //$this->view->display('index_view');
   // $this->load->library('mojagcart','mojagcart');
     //echo 'yay';
         // print_r($_SESSION['items']);
     $items = '';
     if (isset($_SESSION['items']))
   		  $items = $_SESSION['items'];
	
	//add the items
	$name = $_GET['name'];
	$price = $_GET['price'];
	$slug = $_GET['slug'];
	$item = array('name'=>$name,'price'=>$price,'slug'=>$slug,'quantity'=>1);
	$items[] = $item;
	$_SESSION['items']=$items;
	//get the total
	$total = 0;
	$i=0;
	foreach($items as $item)
	{
		$total = $total+$item['price'];
		$i++;
	}
	//echo $total;
	$fin['basket'] = array('total'=>$total,'numberofitems'=>$i);
	$fin['basketitems'] = $items;

	echo json_encode($fin);
    
  }
  
  function emptyBasket()
  {
  	unset($_SESSION['items']);
  }
  
  function renderBasket()
  {
  	print_r($_SESSION);
  }

}

?>
