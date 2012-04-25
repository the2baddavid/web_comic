<?php

/*
 * Admin Page
 * 
 * TODO: Function calls for uploading/editing extras?
 * TODO: Add JS Form Validation
 * 
 */

/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/

    include_once('modules/modules.php');
    include_once('queries/get_comics.php');   // Sometimes Causes 500 error
    include_once('add/add_comic');

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
    <div id="add_news" class="span-10"> 
        <form action="add/add_news.php" method="post">
            <h3>Add News: </h3>
            
            <h4>Title:</h4>
            <input type="text" name="news_title" />
            
            <h4>Article:</h4>
            <textarea name="news_article" ></textarea>
            
            <input type="submit" value="Submit"/>
        </form> <br/> <br/>
    </div>

    <div id="add_comic" class="span-10" style="float:right">
        <form action="add/add_comic.php" method="post" enctype="multipart/form-data">
            <h3>Add Comic: </h3>
            
            <h4>Add to Existing Book, or Create New?</h4>
            <input type="radio" name="new_name" value="yes"/> New Book
            <input type="text" name="book_name" ></input><br/>
            <?php
                display_book_choices($con); 
            ?><br/>
            
            <h4>Select Comic File:</h4>
            <input name="new_comic" type="file"/><br/>
            <input type="submit" value="Upload"/>
        </form>
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