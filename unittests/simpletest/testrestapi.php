<?php
//echo 'ddd';
require_once('simpletest/autorun.php');
require_once('../standalone/mojagclass.php');

class testMojagClass extends UnitTestCase {
	
	var $streamid = '4241';  //set a the base stream id
	var $currentversion = "1.2";
	
	function __construct() 
	{
		//check for a stream id being passed.
		if (isset($_GET['streamid']))
			$this->streamid = $_GET['streamid']; 	
		if (isset($_GET['streamid']))
			$this->currentversion = $_GET['currentversion']; 		
	}
	
	function testVersion() 
	{
		$mojagclass = new mojagclass;
	 	$version = $mojagclass->getVersion();
		//echo $version;
		$this->assertEqual($version,$this->currentversion);
		//$this->assertJson($version);
	}

	
	function testTweets() 
	{
		$mojagclass = new mojagclass;
	 	$tweets = $mojagclass->getTweets($this->streamid);
		$this->assertObject($tweets);
		//print_r($tweets);
		//$this->assertEqual($version,"1.3");
	}	
	
	
	
	
}


//run the tests
$testmc = new testMojagClass;
//echo $testmc->testversion();

?>
