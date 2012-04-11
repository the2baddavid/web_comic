<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('../database/db_object.php');

function add_news($db,$title,$article)
{
    $query = "INSERT INTO news(name,article,date) VALUES ($title,$article,'CURDATE()')";
    $db->query($query);
}
?>


