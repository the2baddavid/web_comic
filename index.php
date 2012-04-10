<?php

/*
 * index.php
 * 
 * main page
 * moved this out of a folder since index needs to be in the root directory
 * 
 * we can leave the other stuff in the webpage folder if we want though
 */

include_once('modules/modules.php');
include_once('database/db_object.php');  

$server_name='localhost';
$db_name='';
$user='user';
$pass='pass';

$db = new DB_OBJECT($server_name, $db_name, $user, $pass);

display_start();    // No Span
display_header();   // Span should be 24, the entire page
display_menu();     // if horizontal then this should also span 24

/*  
 *  Stuff Above is needed for most pages, and you can just copy paste this
 */
?>  

<!-- Stuff that is specific to a page goes here -->

    <div id="home-comic" class="span-15">
        <!--    This will be where we display the latest comic, however we
                must be sure that the image doesn't try to push over into
                where the news goes.  Make sure image size is specified
                Following should word for getting the path of the most recent
                comic added.-->

        <img id ="comic_latest" alt="latest comic"
            src="images/stock_image.jpg"></img>
                <?php
                //  Remove Above Junk
                //  comics_get_latest($db);
                ?>
    </div>
    
    <div id="home-news" class="span-8">
        <!--    Here we can display the news for the home page.
                We can use the span to keep it within its own block -->
        <p>
            This will be where we display the latest news and comic, however we
                must be sure that the image doesn't try to push over into
                where the news goes.  Make sure image size is specified
                Following should word for getting the path of the most recent
                comic added.
            <?php 
            //  remove dummy paragraph
            //news_get_latest($db);
            ?>
        </p>
    </div>

<!-- Back to Php for the footer! -->
<?php

display_footer();

?>