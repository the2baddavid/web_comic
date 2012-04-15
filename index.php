<?php

/*
 * index.php
 * 
 * main page
 * moved this out of a folder since index needs to be in the root directory
 * 
 * we can leave the other stuff in the webpage folder if we want though
 * 
 * TODO: Increase Font Size
 */


/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
include_once('modules/modules.php');
include_once('database/db_object.php');  
include_once('queries/get_comics.php');
include_once('queries/get_news.php');

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

<!-- Stuff that is specific to a page goes here -->

    <div id="home-comic" class="span-15">
        <?php
            $comic = comics_get_latest($con);
            echo "<img id ='comic_latest' alt='latest comic' src=$comic height='800' width='400'> </img>"
        ?>
    </div>
    
    <div id="home-news" class="span-8">
        <?php
            $news = news_get_latest($con);
            echo "<h3>".$news['name']."</h3>";
            echo "<p>".$news['article']."</p>";
        ?>
    </div>
<?php
/****************************************************************
 * Finish With the Footer
 ****************************************************************/
display_footer();



/****************************************************************
 * End of Page -- Additional Functions
 ****************************************************************/

?>