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
    include_once('queries/get_comics.php');
    include_once('queries/get_images.php');
    include_once('queries/get_comics.php');

    $con = connection_start();
/****************************************************************
 * Start Web Page! Load Modules
 ****************************************************************/
    display_start();   
    display_header();  
    display_menu();    
/****************************************************************
 * Unique Page Info
 ****************************************************************/

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
            $chapter = comics_get_book_and_comic($con, $temp_book['id']);
            
            foreach($chapter as $temp_chapter)
            {
                echo "<a href='viewer.php?book=".$temp_book['id']."&chapter=".$temp_chapter['chapter']."'>".$temp_chapter['chapter']."</a><br/>";
            }
        }
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