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
<<<<<<< HEAD
    /*  Table 
     * Framework for Comics
     *      Print Each Book
     *          Print Corresponding Comics
     */
?>

<div id="comics" class="span-14">
    <?php
        $book = comics_get_books($con);
        
        foreach ($book as $temp_book)
        {
            echo "<h3>".$temp_book['b_name']."</h3>";
            $chapter = comics_get_chapters($con, $temp_book['id']);
            
            foreach($chapter as $temp_chapter)
            {
                echo "<a href=''>".$temp_chapter['chapter']."</a><br/>";
            }
        }
    ?>
</div>
=======
?>



>>>>>>> 5d6a912f6699a2f2828bb760701ee6f4590b3c59

<?php
/****************************************************************
 * Finish With the Footer
 ****************************************************************/
    display_footer();



/****************************************************************
 * End of Page -- Additional Functions
 ****************************************************************/
?>