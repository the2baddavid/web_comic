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
    include_once('add/connection.php');
    
	$con = connection_start();

/****************************************************************
 * Load web page, then revert back after adding
 ****************************************************************/
    echo <<< _END
    
    <html><head>
    <script type="text/javascript">
        function move(){
            window.location='../index.php';
        }
    </script>
    <body onload="setTimeout('move()', 1000)">
_END;
    
    add_news($con,$_POST);
	echo "</body></head></html>";
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


