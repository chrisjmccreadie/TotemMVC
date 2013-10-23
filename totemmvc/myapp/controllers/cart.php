<?php
/**
 *
 * @package		Mojag Cart
 * @author		Totem Software
 * 
 * This is a generic AJAX controller to be used with the mojagcart.js it allows you to simply store items for later sending to mojagcart.  You can easily extend this to store in a database 
 * or anything else you wish.
 * 
 * TODO: 
 * 
 * 
 */
 
class Cart_Controller extends TinyMVC_Controller
{
	
	/*
	 * This function will retieve an order from the file systems using the buyers email address.  Useful for debugging.
	 */
   	function getordercache()
	{
		$email = $_GET['email'];
		//$res = $this->load->library('mojagcart','mojagcart');
		$res = $this->mojagcart->getCacheorder($email);
		echo 'Order Info';
		
		print_r($res);
	} 
	
	function result()
	{	 
		// print_r($_SESSION);
		if (isset($_POST['stripeToken']))
		{
			//chanrge the card and save the order.
			$order = $this->mojagcart->saveOrder($_POST['stripeToken'],'',$_SESSION['items'],$_SESSION['orderinformation']);
			
  		}
		else 
		{
			//check and process paypal
			echo '<p>Nope, nada</p>';
		}
	}
   
   
   /*
    * Store the order information
    */
   function storeorderinfo()
   {
   	session_start();
   		  $billingname = '';
   		  $shippingname = '';
   		  $billingaddress1 = '';
   		  $billingaddress2 = '';
   		  $billingaddress3 = '';
   		  $billingaddress4 = '';
   		  $billingaddress5 = '';
   		  $shippingaddress1 = '';
   		  $shippingaddress2 = '';
   		  $shippingaddress3 = '';
   		  $shippingaddress4 = '';
   		  $shippingaddress5 = '';
   		  $shippingemail = '';
   		  $billingemail = '';
   		  $billingnotes = '';
   		  $shippingnotes = '';
   		  $cost = '';
   		  $shippingcost = '';

		  //get the details.
		  if (isset($_POST['billingname']))
		 	 $billingname = $_POST['billingname'];
		  if (isset($_POST['shippingname']))
		  	$shippingname = $_POST['shippingname'];
		  if (isset($_POST['billingaddress1']))
		  	  $billingaddress1 = $_POST['billingaddress1'];
		  if (isset($_POST['billingaddress2']))		  
			$billingaddress2 = $_POST['billingaddress2'];
		  if (isset($_POST['billingaddress3']))
			$billingaddress3 = $_POST['billingaddress3'];
		  if (isset($_POST['billingaddress4']))
			$billingaddress4 = $_POST['billingaddress4'];
		  if (isset($_POST['billingaddress5']))
			$billingaddress5 = $_POST['billingaddress5'];
		  if (isset($_POST['shippingaddress1']))
			 $shippingaddress1 = $_POST['shippingaddress1'];
		  if (isset($_POST['shippingaddress2']))
			$shippingaddress2 = $_POST['shippingaddress2'];
		  if (isset($_POST['shippingaddress3']))
			$shippingaddress3 = $_POST['shippingaddress3'];
		  if (isset($_POST['shippingaddress4']))
			$shippingaddress4 = $_POST['shippingaddress4'];
		  if (isset($_POST['shippingaddress5']))
			$shippingaddress5 = $_POST['shippingaddress5'];
		  if (isset($_POST['billingemail']))
			$billingemail = $_POST['billingemail'];
		  if (isset($_POST['shippingemail']))
			$shippingemail = $_POST['shippingemail'];	
		  if (isset($_POST['billingnotes']))
	  		 $billingnotes = $_POST['billingnotes'];
		  if (isset($_POST['shippingnotes']))
			$shippingnotes = $_POST['shippingnotes'];	
		  if (isset($_POST['cost']))
	  		   $cost = $_POST['cost'];
		  if (isset($_POST['shippingcost']))
			 $shippingcost = $_POST['shippingcost'];

		  //build the array
		  $orderinformation = array('billingname'=>$billingname,'billingaddress1'=>$billingaddress1,'billingaddress2'=>$billingaddress2,'billingaddress3'=>$billingaddress3,'billingaddress4'=>$billingaddress4,'billingaddress5'=>$billingaddress5,'shippingname'=>$shippingname,'shippingaddress1'=>$shippingaddress1,'shippingaddress2'=>$shippingaddress2,'shippingaddress3'=>$shippingaddress3,'shippingaddress4'=>$shippingaddress4,'shippingaddress5'=>$shippingaddress5,'billingemail'=>$billingemail,'shippingemail'=>$shippingemail,'billingnotes'=>$billingnotes,'shippingnotes'=>$shippingnotes,'cost'=>$cost,'shippingcost'=>$shippingcost);
		  
		  //store it
		  $_SESSION['orderinformation'] = $orderinformation;
		  //create a response 
		  $res = array('result'=>'order information stored');
		  //encode it
		 // $res = $_SESSION['orderinformation'];
		  $out = json_encode($res);
		  
		  
		  //return it
		  echo $out;
   }
   
   
   //depericated function
   function payBasket()
   {
   	session_start();
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
   
   /*
    * get the basket items and return them.
    */
   function getBasket()
   {
   	session_start();
   	if (isset($_SESSION['items']))
	{
		//get the items
	   	$items = $_SESSION['items'];
		//initalise some variables
		$total = 0;
		$i=0;
		//loop through the items and get the total
		foreach($items as $item)
		{
			//count the price
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

   /*
    * get the basket total
    * 
    * params
    * 
    * returns
    * 
    * total = total of all items
    * numberofitems = the number of items in the basket
    */
   function getBasketTotal()
   {
   	session_start();
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
		//$fin['basketitems'] = $items;
	
	}
	else
	{
		$fin = '';
	}		
	echo json_encode($fin);   			

   }
   
  /*
   *add an item to the basket.
   * 
   * params
   * 
   * name = name of the items
   * price = price of the item
   * slug = item slug 
   * quantity = is always assumed to be 1
   * 
    * returns
    * 
    * total = total of all items
    * numberofitems = the number of items in the basket
   */ 
  function addBasket()
  {
  	session_start();
  	//blank the items var as its going to be used an an array later
     $items = '';
	 //check if we have any items and set them
     if (isset($_SESSION['items']))
   		  $items = $_SESSION['items'];
	
	//add the items
	$name = $_GET['name'];
	$price = $_GET['price'];
	$slug = $_GET['slug'];
	
	//make an array
	$item = array('name'=>$name,'price'=>$price,'slug'=>$slug,'quantity'=>1);
	//add it to the array
	$items[] = $item;
	//store it in the session
	$_SESSION['items']=$items;
	//get the total
	$total = 0;
	$i=0;
	foreach($items as $item)
	{
		$total = $total+$item['price'];
		$i++;
	}
	//set the basket items
	$fin['basket'] = array('total'=>$total,'numberofitems'=>$i);
	$fin['basketitems'] = $items;
	//return it
	echo json_encode($fin);
	    
  }
  
  /*
   * empty the basket
   */
  function emptyBasket()
  {
  	session_start();
  	unset($_SESSION['items']);
  }
  
  /*
   * out put the basket items ( debug item )
   */
  function renderBasket()
  {
  	session_start();
  	print_r($_SESSION);
  }
  

}
?>