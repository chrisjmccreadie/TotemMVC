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
class Mojagcartajax
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
		$total = number_format($total,2);
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
		if (!empty($items))
		{
			foreach($items as $item)
			{
				//print_r($item);
				//count the price
				 $ltotal=$item['price']*$item['quantity'];
				$total = $total+$ltotal;
			//	$total = $total+$item['price'];
				$i++;
			}
			$total = number_format($total,2);
			//echo $total;
			$fin['basket'] = array('total'=>$total,'numberofitems'=>$i);
			$fin['basketitems'] = $items;
		}
		else {
		$fin['basket'] = array('total'=>0.00,'numberofitems'=>0);
		$fin['basketitems'] = '';		
		}
	
	}
	else
	{
		$fin['basket'] = array('total'=>0.00,'numberofitems'=>0);
		$fin['basketitems'] = '';
	}		
	echo json_encode($fin);   			

   }
   
   
  //updat the quantity
  function updateQuanityBasketItem()
  {
 	session_start();
  	 if (isset($_SESSION['items']))
   		 $items = $_SESSION['items'];
	
		//add the items
		$id = $_GET['id'];
		$quantity = $_GET['quantity'];
		$mcid = $_GET['mcid'];
		$i=0;
		$total=0;
		foreach($items as $item)
		{
			if($mcid == $item['id'])
			{
				//print_r($items);
				 $items[$i]['quantity'] = $quantity;
	 			$_SESSION['items'] = $items;
				$ltotal=$item['price']*$quantity;
				///echo "ok";
				//exit;					
			}
			else {
				 $ltotal=$item['price']*$item['quantity'];
			}
			//$ltotal=$item['price']*$item['quantity'];
			$total = $total+$ltotal;
			//print_r($item);
			//echo $total.'<br/>';		
			$i++;	
			//$i++;
		} 
				$total = number_format($total,2);	
				$fin['basket'] = array('total'=>$total,'numberofitems'=>$i);
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
		$total = number_format($total,2);
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
	 $acheck = '';
	 //check if we have any items and set the
	// unset($_SESSION['items']);
     if (isset($_SESSION['items']))
	 {
   		  $items = $_SESSION['items'];
		  $acheck = $_SESSION['acheck'];	 	
	 }

	
	//add the items
	$name = $_GET['name'];
	$price = $_GET['price'];
	$slug = $_GET['slug'];
	$id = $_GET['id'];
	
	$check = false;
	if (is_array($acheck))
	{
		while ($check == false)
		{
			$iid = rand(0,10000);
			if (in_array($iid, $acheck)) {
	   			// echo "Got Irix";
			}
			else
			{
				$check = true;
			}		
		}		
	}
	else {
		$iid = rand(0,10000);
		$acheck[] = $iid;
	}
 	$_SESSION['acheck'] = $acheck;	

	//make an array
	$item = array('id'=>$iid,'mcid'=>$id,'name'=>$name,'price'=>$price,'slug'=>$slug,'quantity'=>1);
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
	$total = number_format($total,2);
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
  
  
    //remove the item from the basket
  function removeBasketItem()
  {
  	
	session_start();
  	 if (isset($_SESSION['items']))
   		 $items = $_SESSION['items'];
	
	$sesitems='';
	//unset($_SESSION['items']);
		//add the items
		$id = $_GET['id'];
				$mcid = $_GET['mcid'];
				$quantity = $_GET['quantity'];
		$i=0;
				$total=0;
				$ltotal= 0;
				$removed = 1;
		foreach($items as $item)
		{
			//echo $i.'ddd '.$id;
			if(($mcid == $item['id']) && ($quantity == $item['quantity']))
			{


	
			}
			else {
				$sesitems[] = $item;
				$ltotal=$item['price']*$item['quantity'];
				$total = $total+$ltotal;	
			}
	
			$i++;	
			//$i++;
		}
		$_SESSION['items'] = $sesitems;
		$total = number_format($total,2);
		$fin['basket'] = array('total'=>$total,'numberofitems'=>$i-1);
		echo json_encode($fin);
  }
  

}
?>
