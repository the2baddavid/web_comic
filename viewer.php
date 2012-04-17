<?php

/*
 *  Standalone Viewer for comics
 * 
 * $comic_num determines which chapter of the book is displayed, defaults to 0
 * All the information for a book is dumped into $comics, which is a 
 * numerical array holding sock arrays with all the information for each chapter
 */


/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('modules/modules.php');
    include_once('database/db_object.php');  
    include_once('queries/get_about.php');
    include_once('queries/get_images.php');

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

echo '<div id="comic-viewer" class="span-12">';
    // Extract $_GET info
    $book = $_GET['book'];
    $chapter = $_GET['chapter'];
    
    // Query Database
    $comics = comics_get_book_and_comic($con, $book);
    
    // print book & chapter
    echo "<h3>".$_GET['book']."</h3>";
    
    // print selected image from book
    echo "<img href=".$comics[$chapter]." id='current-comic'/>";
    
    // print caption?
    
echo '</div>';

/****************************************************************
 * Finish With the Footer
 ****************************************************************/
display_footer();



/****************************************************************
 * End of Page -- Additional Functions
 ****************************************************************/
?>

