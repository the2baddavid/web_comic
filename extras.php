<?php

/*
 * Extras Page, for the extras for the sites (jokes, fanart, promo material, etc.)
 */

/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('modules/modules.php');
    include_once('database/db_object.php');  
    include_once('queries/get_comics.php');   // causing 500 error, had error in code

    $con = mysql_connect("localhost","user","pass");
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con);
/****************************************************************
 * Start Web Page! Load Modules
 ****************************************************************/ 
    display_start();    // No Span
    display_header();   // Span should be 24, the entire page
    display_menu();     // if horizontal then this should also span 24
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