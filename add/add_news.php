<?php

/*
 * Add News Script
 * 
 * TODO: Add Auto Revert Back to Page with JS? 
 * 
 * Removed inclusions since they are not needed
 */
/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
   $con = mysql_connect("localhost","user","pass");
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con);

/****************************************************************
 * Load web page, then revert back after adding
 ****************************************************************/
    add_news($con,$_POST);
    ?>    
 
    <div id="revert" onLoad="setTimeout('move()', 1000)"></div>

    <script type="text/javascript">
        function move(){
            window.location='../index.php';
        }
    </script> 
    
    
    <?php
/****************************************************************
 * Functions
 ****************************************************************/

function add_news($db,$post)
{
    $title = $post['news_title'];
    $article = $post['news_article'];
    
    $query = "INSERT INTO news(name,article,date_added) VALUES ('$title','$article',CURDATE())";
    $success = mysql_query($query,$db);
    
    if(!$success) 
        die("<p> Uh, something went wrong...<br/>".mysql_error()."<br/>".$query."</p>");
    else 
        echo "  <p> Successful Upload </p>
                <a href='admin.php'>Admin</a> 
                <a href='index.php>Home</a>";
}
?>


