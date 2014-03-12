<?php

/*
 * Mojag Cache (PHP version)
 * Copyright : none, use it and enjoy it.
 * author : Chris McCreadie
 * date added : 05/10/2012
 * date updated : 01/03/2013
 * 
 * This class handles all the caching at an object level.
 * 
 * This class is has been coded it be as simple as possible to make it as accessable as possible, please if it is to simplistic for your needs
 * create a super duper mutexed version with all the trimmings, we would love to invclude it,
 * 
 * Based othe JGCache class which can be found here
 * 
 * 	http://www.jongales.com/blog/2009/02/18/simple-file-based-php-cache-class/
mojagClass extends mojagCache
 * TODO: add memcachier support.
 * 
 * Memcachier.
 * 
 * http://www.memcachier.com/
 * 
 * Using memcachier is very convient for many sites that do have write access to their files.  You can store the data in the cloud.
 * 
 */
 error_reporting(E_ALL);
 require_once('mojagCache.php');
 

class tinymvc_library_mojagcart extends mojagCache {
	
	//the live url checker
	var $useurl='http://www.mojagcart.com/index.php?/rest/';  //the url to use.
	var $version = '1';	 // Hold the version of the Mojag Class we may need to update this at some point.
	var $cacheit = 1; //set if you want to use intellgent caching.
	var $debug = 0; //set the debug var
	var $orderurl = 'http://www.mojagcart.com/index.php/rest/orderadd/';
	var $companyid = 11; //store the mojag cart company id.
	//var $useurl='http://localhost:8888/mojag/index.php/rest/rest/';
	//stripe
	var $pktest = 'pk_test_t9wTwx0pmLYyOvBBSda2dZI8';
	var $sktest = 'sk_test_2ThNiVp1QKSKwzjUboY45dAo';
	var $pklive = 'pk_live_w2iqJl9CKdQS0KIoSni4aRwM';
	var $sklive = 'sk_live_UPiLp91D4NdbQKbQzwbSgPfz';
	var $mojagkey = 'sk_live_UPiLp91D4NdbQKbQzwbSgPfz';
	var $orderdesc = 'EA Burns order';
	var $per = 7.4;
	var $mcversion = "0.4";

   
    function __construct()
    {
 
		//constructor will not be fired in mojagcache so we need to set it here.
		if ($this->cacheit = 1)
		{
			//change this to match the DIR of your choosing.
			$this->dir =  $_SERVER['DOCUMENT_ROOT'].'/totemmvc/myapp/plugins/cache';
		}  
	
		
	}
	
	function getVersion()
	{
		echo "Version:".$this->version;
	}
	
	
	/*
	 * This function adds an order to Mojag Cart
	 */
	function addtomojagcart($stripe,$items,$orderinfo)
	{
		//get a session from Mojagcart.   You can get his any time you want so it may be good to check first.
		$session = file_get_contents("http://www.mojagcart.com/index.php?/rest/session");
		$session2 = json_decode($session);
		$session2 = str_replace('{"guid":"', '', $session2);
		$session2 = str_replace('"}', '', $session2);
		
		
		//create a var for storing the items.
		$itemsc='';
		//get all the items
		foreach ($items as $item)
		{
			
			$name = $item['name'];
			$price = $item['price'];
			$price=$price*100;
			$quantity = $item['quantity'];
			$name=urlencode($name);
				$itemsc = $itemsc."$name|$price|$quantity;";	

		}

		//billing details
		$billingname = urlencode($orderinfo['billingname']);
		$billingemail = $orderinfo['billingemail'];
		$billingaddress1 = urlencode($orderinfo['billingaddress1']);
		$billingaddress2 = urlencode($orderinfo['billingaddress2']);
		$billingaddress3 = urlencode($orderinfo['billingaddress3']);
		$billingaddress4 = urlencode($orderinfo['billingaddress4']);
		$billingaddress5 = urlencode($orderinfo['billingaddress5']);

		//shipping details
		$shippingname = urlencode($orderinfo['shippingname']);			
		$shippingemail = urlencode($orderinfo['shippingemail']);			
		$shippingaddress1 = urlencode($orderinfo['shippingaddress1']);
		$shippingaddress2 = urlencode($orderinfo['shippingaddress2']);
		$shippingaddress3 = urlencode($orderinfo['shippingaddress3']);
		$shippingaddress4 = urlencode($orderinfo['shippingaddress4']);
		$shippingaddress5 = urlencode($orderinfo['shippingaddress5']);
		$snotes = urlencode($orderinfo['shippingnotes']);	
		if (isset($orderinfo['notes']))	
			$notes = urlencode($orderinfo['notes']);	
		else {
			$notes = '';
		}	

		//get the totals
		$ordertotal =$orderinfo['cost'];
		$finshipping =$orderinfo['shippingcost'];

		
		//connect to Mojag Cart to store the order.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->orderurl);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');

		// Set request method to POST
		curl_setopt($ch, CURLOPT_POST, 1);

		// Set query data here with CURLOPT_POSTFIELDS
	 	 curl_setopt($ch, CURLOPT_POSTFIELDS, array('giftbox' => '',
	 	 'items'=>$itemsc,
         'notes' => $notes,
         'companyid' => $this->companyid,
         'samedeliveryaddress' => "0",
         'paymentReference' => $stripe,											
         'ordertotal' => $ordertotal,											
		 'sesid' => $session2,											
		 'inputName' => $billingname,											
		  'inputEmail' => $billingemail,											
		  'inputStreet' => $shippingaddress1,											
		  'inputTown' => $shippingaddress2,	
		  'inputCity' => $shippingaddress3,	
		   'inputTelephone' => '',	
		   'inputPostcode' => $shippingaddress4,	
		   'inputCountry' => $shippingaddress5,
		   'billingaddress1' => $billingaddress1,												
		    'billingaddress2' => $billingaddress2,	
			'billingaddress3' => $billingaddress3,	
			'billingaddress4' => $billingaddress4,
			'billingaddress5' => $billingaddress5,	
			 'sname' => $shippingname,
		     'semail' => $shippingemail,
		    'snotes' => $snotes,
			'shippingcost' => $finshipping				
			));
	
		$content = trim(curl_exec($ch));
		curl_close($ch);
		//	print_r($content);
		//	exit;
		$oi = array('shippingcost'=>$finshipping,'notes'=>$notes,'companyid'=>91,'samedeliveryaddress'=>0,'paymentReference'=>$stripe,'ordertotal'=>$ordertotal,'sesid'=>$session2,'inputStreet'=>$shippingaddress1,'inputTown'=>$shippingaddress2,'inputTelephone'=>'','inputCity'=>$shippingaddress3,'inputPostcode'=>$shippingaddress4,'inputCountry'=>$shippingaddress5,'billingaddress1'=>$billingaddress1,'billingaddress2'=>$billingaddress2,'billingaddress3'=>$billingaddress3,'billingaddress4'=>$billingaddress4,'billingaddress5'=>$billingaddress5,'sname'=>$shippingname,'semail'=>$shippingemail,'snotes'=>$snotes);
		$so = array('orderinfo'=>$oi,'items'=>$itemsc);
		$this->set($billingemail,$so);
	}


	function getCacheorder($name)
	{
		//echo $name;
		return($this->get($name));
	}
	
	
	function saveOrder($stripetoken = '',$payaplresult = '',$items,$orderinformation,$total)
	{
		//include stripe.
		//require_once($_SERVER['DOCUMENT_ROOT'].'/totemmvc/myapp/plugins/stripe.php');
		//configure stripe.
		//$config['stripe_key_test_public']         = 'pk_test_t9wTwx0pmLYyOvBBSda2dZI8';
		//$config['stripe_key_test_secret']         = 'sk_test_2ThNiVp1QKSKwzjUboY45dAo';
		//$config['stripe_key_l)ive_public']         = 'pk_live_w2iqJl9CKdQS0KIoSni4aRwM';
		//$config['stripe_key_live_secret']         = 'sk_live_UPiLp91D4NdbQKbQzwbSgPfz';
		//$config['stripe_test_mode']               = FALSE;
		//$config['stripe_verify_ssl']              = FALSE;
		// Create the library object
		//$stripe = new Stripe( $config );
		require_once($_SERVER['DOCUMENT_ROOT'].'/totemmvc/myapp/plugins/stripe/lib/Stripe.php');
		//echo 'ddd';
		$res = Stripe::setApiKey($this->sklive);
		//echo "dddff".$res;
		//exit;
		//charge the card
		$fee = round($total / 100 *$this->per);
		//echo $fee;
		//exit;
		//live card fee token
		//sk_live_SMPoey3VTNxFIwemyn6VSzWp
		//test token
		//sk_test_ZF7HRsrZirMcVxz5Wi22TKUz
		
		//Fee code not working so disabled for now.
		try {
			
			$charge = Stripe_Charge::create(array(
			  "amount" => $total, // amount in cents, again
			  "currency" => "gbp",
			  "card" => $stripetoken,
			  "description" => $this->orderdesc,
			  "application_fee"=>$fee),$this->mojagkey
			);
		} catch(Stripe_CardError $e) {
  			// The card has been declined
  			//print_r($e);
  			//$body = $e->getJsonBody();
  			//$err = $body['error']['code'];
  			$err  = '<p class="order-confirm">There was an error charging your card. Please verify your card details and try again.</p>';
		} catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API
		  $err = '<p class="order-confirm">Invalid parameters were entered. Your card has not been charged. We apologise for the inconvenience. Please try again, and should you encounter another error please get in touch.</p>';
		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  $err = '<p class="order-confirm">Error with Stripe Authentication</p>';
		  // (maybe you changed API keys recently)
		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		  $err = '<p class="order-confirm">Connection to the payment gateway has failed. Your card has not been charged. Please ensure you have no problems with your internet connection and try again.</p>';
		} catch (Stripe_Error $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		  $err = '<p class="order-confirm">An error has occurred with the payment gateway. Your card has not been charged. We apologise for the inconvenience. Please try again, and should you encounter another error please get in touch.</p>';
		} catch (Exception $e) {
		  // Something else happened, completely unrelated to Stripe
		  $err = '<p class="order-confirm">An error has occured and your order has not been processed. We apologise for the inconvenience. Please try again, and should you encounter another error please get in touch.</p>';
		}
		
		//echo $stripetoken;
		//exit;
	//$charge = Stripe_Charge::create(array('card' => $stripetoken, 'amount' => 2000, 'currency' => 'gbp'));
	if (empty($charge))
		echo $err;
	else echo '<p class="order-confirm">Thank you for shopping at E.A.Burns. Payment was successful and your order is being processed. You will receive a confirmation email shortly</p>';
	
		//$res = $stripe->charge_card($total,$stripetoken,'Payment',$fee)	;	
	//	echo "ddd";
	//	print_r($res);
	//	exit;
		
		//add to cart
		$this->addtomojagcart($stripetoken, $items, $orderinformation);
		//print_r($items);
		//print_r($orderinformation);
	}


	//this function fetches the page.
	function fetchPage($url)
	{
		//if its a heartbeast set the timeout to one second
		if ($url == "ping/")
			$opts = array(  'http' => array( 'timeout' => 1   ) ) ;
		else
	 		$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
		
		//define the page to call here
		$cacheurl = $url;
		//echo $this->dir;
		//exit;
		if ($this->debug == 1)
		{
			echo "Cache Name:$cacheurl<br/>";
		}
		$url = $this->useurl.$url;
		if ($this->debug == 1)
		{
			echo "REST Call:$url<br/>";
		}
		//echo $url;
		//check the cache
		if ($this->cacheit == 1)
		{
			if ($this->debug == 1)
			{
				echo "Using Smart Cache<br/>";
			}			
			//echo 'cache';
			//echo $cacheurl;
			$cachedata = $this->get($cacheurl);
			if ($this->debug == 1)
			{
				echo "cacheurl ".$cacheurl;
				echo "Data from Cache<br/>";
				print_r($cachedata);
				echo "End data from Cache<br/>";
			}
			//print_r($this->dir);
			//exit; 
			//print_r($cachedata);
			//exit;
			//check if its draft or reacache or blank
			if ((isset($_GET['recache'])) || (isset($_GET['draft'])) || ($cachedata === false))
			{
				if ($this->debug == 1)
				{
					echo "Data not cached<br/>";
					if (isset($_GET['recache']))
						echo "Recache state:Yes<br/>";
					else {
						echo "Recache state:No<br/>";
						
					}
					if (isset($_GET['draft']))
						echo "Draft state:Yes<br/>";
					else {
						echo "Recache state:No<br/>";
						
					}

				}
				$context = stream_context_create($opts);
				$str = file_get_contents($url,false,$context);
				if ($this->debug == 1)
				{
					//echo "Data REST Call<br/>";
					//print_r($str);
					//echo "End data from Cache<br/>";						
				}
				//echo $url;
				//echo "str".$str;
				//exit;
				////decode the json
				$data = json_decode($str);	

				$this->set($cacheurl, $data);  
				if ($this->debug == 1)
				{
					echo 'not server from cache';
				}				
			} 
			else
			{
				$data = $cachedata;
				if ($this->debug == 1)
				{
					echo 'served from cache';
				}
			}
			//print_r($cachedata);
			
		}
		else
		{
			//we are not using caching so just get the page as normal
			//debug information
			//echo $url.'</br>';
			//exit;
			//get the contents, this would be better in CURL but its not on 100% of all servers.
			
			$context = stream_context_create($opts);
			$str = file_get_contents($url,false,$context);
		//	echo "str".$str;
			//exit;
			//decode the json
			//print_r($data);
			$data = json_decode($str);			
		}

		//print_r($data);
		//exit;
		return($data);
		//print_r($data);;
	}



	 function fetchProducts($companyid,$meta = '',$match = 'any')
	 {
	 	//echo "sdd".$match;
		//exit;
	 	if ($meta != '')
		{
			$url = "productlist/?companyid=$companyid&meta=$meta&match=$match";
			
		}
		else
		{
			$url = "productlist/?companyid=$companyid";
		}
		//echo $url;
		$products = $this->fetchPage($url);
		return($products);		
	 }
	 
	 function fetchFeaturedProducts($companyid)
	 {
		$url = "featuredproduct/?companyid=$companyid";
		$products = $this->fetchPage($url);
		return($products);	
	 }
	 
	 function countItems()
	 {
	 	return(0);
	 }
	 
	 function fetchCollectionSlots($companyid)
	 {
	 	$time = date("d-m-y");

		$url = "deliveryslots/?companyid=$companyid&time=$time";
		$products = $this->fetchPage($url);
		return($products);		 
	 }
	 
	 function processCollectionSlots($slots,$starttime,$removepast = true)
	 {
	 	$time = time();
		//echo $slots->starttime;
		$sh =date('H:i',$starttime);
		$nt =date('H:i',strtotime('+2 hours'));
		$ct =date('d',strtotime('+2 hours'));
		$sc =date('d');		
		//get the time now to check it has not passed midnight
		//echo $ct;
		//echo $sc;
		//exit;
		if ($ct != $sc)
		{
			//echo 'in';
		 return('');
			
		}
		//echo $sh;
		//echo $nt;
		$now= 0;
		$actviveslot = 0;
		//echo $nt;
		//print_r($slots);
		foreach ($slots as $item) 
			{
				//exit;
    			$at = date('H:i',$item->time);
    			//echo $at.'<br/>';
				//exit;
     		   if ($at >= $nt)
			   {
			       //echo 'ddddd';
				   //exit; 
				  // $time = date('H:i',$a);
				   //echo $at;
				   //exit;
					break;
				}
			   $actviveslot++;
    		}
			//print_r($slots);
			//exit;
			//echo $actviveslot;
			//exit;
	 	$i=0;
	 	foreach($slots as $item)
		{
			//echo $item->Text;
			//echo $item->Text.' '.$nt.'<br/>';
			//state 0 = past
			//state 1 = now
			//state 2 = future
			$lower = 1;
			if ($i < $actviveslot)
			{
					$item->state = '0';
					if ($removepast == true)
						unset($slots[$i]);
					
			}
			else {
				if ($actviveslot == $i)
					$item->state = '1';
				else {
					if ($i > $actviveslot)
						$item->state = '2';
						
				}
			}
			

			
			$i++;
		}
		
		//print_r($slots);
		 return($slots);
					exit;
		
	 }

	


}
