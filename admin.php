<?php

/*
 * Admin Page
 * 
 * Function calls for uploading/editing comics
 * Function calls for uploading/editing news
 * Function calls for uploading/editing about pages
 * Function calls for uploading/editing extras?
 * 
 * TODO: Add Call Functions for Admin
 */

include_once('modules/modules.php');
include_once('database/db_object.php');  

$server_name='localhost';
$db_name='';
$user='user';
$pass='pass';

$db = new DB_OBJECT($server_name, $db_name, $user, $pass);
?>
