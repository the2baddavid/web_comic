<?php

/*
 * Admin Page
 * 
 * Function calls for uploading/editing comics
 * Function calls for uploading/editing news
 * Function calls for uploading/editing about pages
 * Function calls for uploading/editing extras?
 * 
 * TODO: Add Call Functions for Admin
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
?>
<!-- Stuff that is specific to a page goes here -->
<div id="add_news" class="span-10"> 
<form action="add_news.php" method="POST">
    <h3>Add News: </h3>
    <h4>Title:</h4>
    <input type="text" id="news_title"/>
    <h4>Article:</h4>
    <textarea id="news_article"></textarea>
    <input type="submit" value="Submit"/>
</form> <br/> <br/>
</div>

<div id="add_comic" class="span-10" style="float:right">
<form action="add_comic.php" method="POST">
    <h3>Add Comic: </h3>
    <h4>Add to Existing Book, or Create New?</h4>
    <input name="book_name" type="radio" value="yes"> New Book </input>
    <?php
        display_book_choices($db); 
    ?>
    <br/>
    <h4>Book Name</h4>
    <input id="new_name" type="text"/>    
    
    <h4>Select Comic File:</h4>
    <input name="uploaded" type="file"/><br/>
    <input type="submit" value="Upload"/>
</form>
    
</div>
<!-- Back to Php for the footer! -->
<?php

display_footer();

?>


<?php

function display_book_choices($db)
{
    $names = comics_get_booknames($db);
    
    foreach ($names as $temp)
    {
        echo '<input name="book_name" type="radio" value="'.$temp.'">'.$temp.' </input>';
    }
}