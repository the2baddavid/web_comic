<?php

/*
 * Leave include statements for all the modules here
 * 
 */
include('start.php');   //  information for browser
include('header.php');  //  first thing the user will see
include('menu.php');    //  main navigation menu

include('footer');      //  last thing the user will see

include ('error.php');  //  funny error reporting
include('../database/db_object.php');   // used for connecting to the database

?>