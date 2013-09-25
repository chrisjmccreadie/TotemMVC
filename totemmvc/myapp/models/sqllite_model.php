<?php
/*
 * SQL Lite model
 * It's Totem doing what it does when it's doing when it's done
 * 
 * We need to use th PDO wrapper at some point.
 * 
 */
class Sqllite_Model extends TinyMVC_Model
{
	//read the database
	function selectdata($dbase,$table,$fields)
  	{
	  	$dbhandle = sqlite_open($dbase);
		$query = sqlite_query($dbhandle, "SELECT * FROM $table");
		$result = sqlite_fetch_all($query, SQLITE_ASSOC);
		foreach ($result as $entry) {
	    	echo 'Name: ' . $entry['bar'];
		}
  	}
  
  //create the database.
  function createdbase($dbase)
  {
  	if ($db = sqlite_open($dbase, 0666, $sqliteerror)) { 
   	 	//sqlite_query($db, 'CREATE TABLE foo (bar varchar(10))');
    	//sqlite_query($db, "INSERT INTO foo VALUES ('fnord')");
   		//$result = sqlite_query($db, 'select bar from foo');
    	//var_dump(sqlite_fetch_array($result)); 
	} 
	else 
	{
    	die($sqliteerror);
	}


  }
  
  //create the table.
  function createtable($dbase,$name,$fields)
  {
  	if ($db = sqlite_open($dbase, 0666, $sqliteerror)) { 
   	 	sqlite_query($db, "CREATE TABLE $name (bar varchar(10))");
	} 
	else 
	{
    	die($sqliteerror);
	}


  }
 
}
?>
