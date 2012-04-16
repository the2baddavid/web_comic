<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('modules/modules.php');
    include_once('database/db_object.php');

    $con = mysql_connect("localhost","user","pass");
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con);
/****************************************************************
 * Load web page, then revert back after adding
 ****************************************************************/
    
    $success = add_news($con,$_POST);
    if(!$success) echo "<p>".mysql_error()."</p>";
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

function add_news($con,&$post)
{   
    //$query = "INSERT INTO news(name,article,date_added) VALUES (".$post['news_title'].",".$post['news_article'].","'date(\'Y-m-d\')'")";
    //$success = mysql_query($query,$con) or die("failed to add news".mysql_error());
    return $success;
}
?>


