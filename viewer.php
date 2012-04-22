<?php

/*
 *  Standalone Viewer for comics
 * 
 * TODO: Image not showing up
 * TODO: Use JS to scroll through images
 * TODO: Caption for images?
 * 
 * $comic_num determines which chapter of the book is displayed, defaults to 0
 * All the information for a book is dumped into $comics, which is a 
 * numerical array holding sock arrays with all the information for each chapter
 */


/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('modules/modules.php'); 
    include_once('queries/get_about.php');
    include_once('queries/get_images.php');
    include_once('queries/get_comics.php');

    $con = mysql_connect("localhost","user","pass");
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con) or die ("couldn't select db");
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
    $chapter = $_GET['chapter']-1;
    
    // Query Database -THIS IS THE ONE THAT SHOULD BE USED, BUT IS CRASHING
    $comics = comics_get_book_and_comic($con, $book);
    
    // *********** DEBUGGING STUFF*****************************
    // ////////////////////////////////////////////////////////
    // Test With What the database SHOULD return
    /*$comics = array();
    $comics[$chapter]['b_name'] = "TEST!";
    $comics[$chapter]['chapter'] = 1;
    $comics[$chapter]['image_path'] = 'comics/sample.jpg';
    echo "<p>".$comics[$chapter]['image_path']."</p>"; 
    ///////////////////////////////////////////////////////////
    //************ End Debug Stuff ****************************** */
    
    // print book & chapter -- Prints 
    echo "<h3>".$comics[$chapter]['b_name'].$comics[$chapter]['chapter']."</h3>";
    
    // print selected image from book -- Still Not showing...
    echo "<img href='/comics/sample.jpg' id=".$_GET['book'].$_GET['chapter']." height='800' width='400'> </img>";
    
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

