<?php

/*
 * Comics Page, will allow for browsing of all the current comics
 * 
 * Function calls for loading all comics by title (and display their title page)
 * Function calls for displaying individual chapters for each comic, (plus recent update)
 * 	-When page is clicked, direct them to the reader, loading that page first
 */

/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('modules/modules.php');
    include_once('database/db_object.php');  
    include_once('queries/get_comics.php');

    $con = mysql_connect("localhost","user","pass");
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con);
/****************************************************************
 * Start Web Page! Load Modules
 ****************************************************************/
    display_start();   
    display_header();  
    display_menu();    
/****************************************************************
 * Unique Page Info
 ****************************************************************/
?>




<?php
/****************************************************************
 * Finish With the Footer
 ****************************************************************/
    display_footer();



/****************************************************************
 * End of Page -- Additional Functions
 ****************************************************************/
?>