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
 
 require_once('mojagCache.php');
 

class tinymvc_library_mojagcart extends mojagCache {
	
	//the live url checker
	var $useurl='http://www.mojagcart.com/index.php?/rest/';  //the url to use.
	var $version = '1';	 // Hold the version of the Mojag Class we may need to update this at some point.
	var $cacheit = 1; //set if you want to use intellgent caching.
	var $debug = 0; //set the debug var
	//var $useurl='http://localhost:8888/mojag/index.php/rest/rest/';
		

   
    function __construct()
    {
    	//set the cache dir.
       // $this->dir = $_SERVER['DOCUMENT_ROOT'].'/mojagclass/cache';
		//print_r($this->dir);
		//exit;  
				//constructor will not be fired in mojagcache so we need to set it here.
		if ($this->cacheit = 1)
		{
			$this->dir =  $_SERVER['DOCUMENT_ROOT'].'/totemmvc/myapp/plugins/cache';
		}  
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

	 function fecthProducts($companyid,$meta = '',$match = 'any')
	 {
	 	//echo $match;
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
	
}
