<?php
/**
 * 
 * Makes the connection to the database ...
 */
function connection_start()
{	
	$server = "localhost";
	$user = "user";
	$pass = "pass";
	
	/*
	$server = "localhost:3306";
	$user = "group022012";
	$pass = "group022012";
	*/
    $con = mysql_connect($server,$user,$pass);
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con);
    //mysql_select_db("group022012",$con);
   
    return $con;
	
}
/**
 * 
 * Used to close the current database connection
 */
function connection_close()
{
	mysql_close($con);
}
?>